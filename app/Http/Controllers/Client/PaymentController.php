<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //

    public function index(App $app)
    {

        // $this->authorize('view', $app); // kiểm tra quyền sở hữu nếu cần

        $plans = config('subscription.plans');

        return view('apps.payment', compact('app', 'plans'));
    }

    public function choose(App $app, Request $request)
    {

        // $this->authorize('view', $app);

        $planKey = $request->input('plan');
        $plans = config('subscription.plans');

        if (!isset($plans[$planKey])) {
            return back()->with('error', 'Gói không hợp lệ.');
        }
        if ($planKey === 'free' && $app->hasUsedFreePlan()) {
            return back()->with('error', 'Bạn đã sử dụng gói miễn phí. Vui lòng chọn gói trả phí.');
        }
        $currentSub = $app->activeSubscription();
        if ($currentSub) {
            $currentSub->update(['is_active' => false]);
        }
        $plan = $plans[$planKey];



        if ($plan['price'] === 0) {
            // Gói free: cấp ngay
            $app->update([
                'is_premium' => true,
                'plan_type' => 'free',
                'premium_expires_at' => now()->addDays(30), // nếu muốn demo 30 ngày; bỏ nếu không
            ]);

            Subscription::create([
                'app_id' => $app->id,
                'plan_type' => 'free',
                'price' => 0,
                'transaction_ref' => Str::uuid(),
                'is_active' => true,
                'expires_at' => now()->addDays(30), // tương ứng
                'vnp_response_code' => '00',
            ]);

            return redirect()->route('app.dashboard', $app)->with('success', 'Bạn đã chọn gói Free.');
        }
    }
    public function createVnPay(App $app, Request $request)
    {
        Subscription::where('app_id', $app->id)
            ->where('is_active', true)
            ->update(['is_active' => false]);

        // $this->authorize('view', $app);

        $planKey = $request->input('plan');
        $plans = config('subscription.plans');

        if (!isset($plans[$planKey])) {
            return back()->with('error', 'Gói không hợp lệ.');
        }

        $plan = $plans[$planKey];
        $amount = $plan['price']; // đơn vị: đồng

        // VNPay config
        $vnp_TmnCode = config('vnpay.tmn_code');
        $vnp_HashSecret = config('vnpay.hash_secret');
        $vnp_Url = config('vnpay.url');
        $vnp_ReturnUrl = config('vnpay.return_url');

        $vnp_TxnRef = uniqid(); // duy nhất
        $vnp_OrderInfo = "Thanh toán gói {$plan['name']} cho app {$app->name}";
        $vnp_Amount = $amount * 1; // nếu dùng đồng thì giữ nguyên
        $vnp_IpAddr = $request->ip();
        $vnp_Locale = 'vn';
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100, // VNPay yêu cầu nhân 100
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => 'other',
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $hashdata = "";
        $query = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // B3: Tạo secure hash
        $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $query . "vnp_SecureHash=" . $vnp_SecureHash;

        // Lưu subscription tạm (chưa active), để dùng ở callback
        Subscription::create([
            'app_id' => $app->id,
            'plan_type' => $planKey,
            'price' => $plan['price'],
            'transaction_ref' => $vnp_TxnRef,
            'is_active' => false,
            'expires_at' => null,
        ]);

        return redirect()->away($vnp_Url);
    }

    public function vnpayCallback(Request $request)
    {
        $input = $request->all();

        // Lấy secret đúng từ config
        $vnp_HashSecret = config('vnpay.hash_secret');

        // Lấy secure hash gửi về, rồi loại ra khỏi bộ tham số để tính lại
        $receivedHash = $input['vnp_SecureHash'] ?? '';
        unset($input['vnp_SecureHash']);
        unset($input['vnp_SecureHashType']); // nếu có

        // Tạo lại hashdata giống y như trong createVnPay (manual urlencode + & logic)
        ksort($input);
        $hashdata = "";
        $i = 0;
        foreach ($input as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        // Tính hash
        $calculatedHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $txnRef = $input['vnp_TxnRef'] ?? null;
        $responseCode = $input['vnp_ResponseCode'] ?? null;

        // Tìm subscription theo transaction ref
        $subscription = Subscription::where('transaction_ref', $txnRef)->first();
        if (!$subscription) {
            return redirect()->route('payment.index', $subscription?->app ?? '/')
                ->with('error', 'Không tìm thấy đơn hàng.');
        }

        $app = $subscription->app;

        // So sánh hash (không phân biệt hoa/thường để an toàn)
        if (strtoupper($calculatedHash) !== strtoupper($receivedHash)) {
            $subscription->update([
                'vnp_response_code' => $responseCode,
            ]);

            Log::error('VNPay callback signature mismatch', [
                'received_hash' => $receivedHash,
                'calculated_hash' => $calculatedHash,
                'hash_data_string' => $hashdata,
                'query_params' => $request->query(),
                'transaction_ref' => $txnRef,
            ]);

            return redirect()->route('payment.index', $app)
                ->with('error', 'Sai chữ ký callback VNPay.');
        }

        if ($responseCode === '00') {
            // Thanh toán thành công
            $planKey = $subscription->plan_type;
            $plans = config('subscription.plans');
            $plan = $plans[$planKey] ?? null;

            $expiresAt = null;
            if (!empty($plan['duration'])) {
                $expiresAt = now()->addDays($plan['duration']);
            }

            $subscription->update([
                'is_active' => true,
                'expires_at' => $expiresAt,
                'vnp_response_code' => $responseCode,
                'vnp_transaction_no' => $input['vnp_TransactionNo'] ?? null,
            ]);

            $app->update([
                'is_premium' => true,
                'plan_type' => $planKey,
                'premium_expires_at' => $expiresAt,
            ]);

            return redirect()->route('app.dashboard', $app)->with('success', 'Thanh toán thành công, app đã được cấp premium.');
        } else {
            // Thanh toán thất bại
            $subscription->update([
                'vnp_response_code' => $responseCode,
            ]);
            return redirect()->route('payment.index', $app)
                ->with('error', 'Thanh toán thất bại: ' . $responseCode);
        }
    }
}
