<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppCustomization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomizationController extends Controller
{
    //
    public function edit(App $app)
    {

        $customization = $app->customizations;

        if (!$customization) {
            $customization = new AppCustomization(['app_id' => $app->id]);
            $customization->settings = json_encode([
                'status_bar_bg_color' => '#ffffff',
                'status_bar_icon_color' => '1',
                'status_bar_change_in_dark_mode' => '0',
                'status_bar_bg_color_dark' => '#000000',
                'status_bar_icon_color_dark' => '2',
                'app_orientation' => '1',
                'enable_fullscreen' => '0',
                'home_screen_bg_color' => '#ffffff',
                'circle_loader_appearance' => '1',
                'circle_loader_hide_on_urls' => '',
                'circle_loader_style' => '1',
                'circle_loader_color' => '#633AE5',
                'circle_loader_bg_color' => '#ffffff',
                'circle_loader_change_in_dark_mode' => '0',
                'circle_loader_color_dark' => '#633AE5',
                'circle_loader_bg_color_dark' => '#000000',
                'enable_pull_to_refresh' => '1',
                'pull_to_refresh_bg_color' => '#ffffff',
                'pull_to_refresh_loader_color' => '#633AE5',
                'disable_default_error_page' => '1',
                'default_error_bg_color' => '#ffffff',
                'default_error_msg' => 'Đã xảy ra lỗi.',
                'error_message_text_color' => '#000000',
                'default_error_btn_txt' => 'Thử lại',
                'try_again_btn_text_color' => '#ffffff',
                'try_again_btn_color' => '#633ae5',
                'error_screen_change_in_dark_mode' => '0',
                'error_screen_bg_color_dark' => '#000000',
                'error_message_text_color_dark' => '#ffffff',
                'try_again_btn_text_color_dark' => '#ffffff',
                'try_again_btn_color_dark' => '#633ae5',
                'exit_on_double_click' => '0',
                'exit_on_double_click_message' => 'Bạn có chắc muốn đóng ứng dụng này không?',
                'exit_on_double_click_confirm_btn_text' => 'Có',
                'exit_on_double_click_cancel_btn_text' => 'Không',
                'allow_bottom_over_scroll' => '1',
                'circle_loader_gif_img' => '', // Không có file mặc định
                'circle_loader_gif_img_file'=>'customization/gif/default_circle_loader_img.gif'
            ]);
            $customization->save();
        }

        $settings = json_decode($customization->settings, true);
        $settings = is_array($settings) ? $settings : [];

        // dd($settings);
        return view('dashboard.settings.customization', compact('app', 'customization', 'settings'));
    }
    public function update(Request $request, App $app)
    {
        // dd($request->all());

        // Xác thực dữ liệu
        $validated = $request->validate([
            'status_bar_bg_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'status_bar_icon_color' => 'nullable|in:1,2',
            'status_bar_change_in_dark_mode' => 'nullable|in:0,1',
            'status_bar_bg_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'status_bar_icon_color_dark' => 'nullable|in:1,2',
            'app_orientation' => 'nullable|in:1,2,3,4',
            'enable_fullscreen' => 'nullable|in:0,1',
            'home_screen_bg_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'circle_loader_appearance' => 'nullable|in:1,2',
            'circle_loader_hide_on_urls' => 'nullable|string|max:2000',
            'circle_loader_style' => 'nullable|in:1,2',
            'circle_loader_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'circle_loader_bg_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'circle_loader_change_in_dark_mode' => 'nullable|in:0,1',
            'circle_loader_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'circle_loader_bg_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'enable_pull_to_refresh' => 'nullable|in:0,1',
            'pull_to_refresh_bg_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'pull_to_refresh_loader_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'disable_default_error_page' => 'nullable|in:0,1',
            'default_error_bg_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'default_error_msg' => 'nullable|string|max:255',
            'error_message_text_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'default_error_btn_txt' => 'nullable|string|max:255',
            'try_again_btn_text_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'try_again_btn_color' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'error_screen_change_in_dark_mode' => 'nullable|in:0,1',
            'error_screen_bg_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'error_message_text_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'try_again_btn_text_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'try_again_btn_color_dark' => 'nullable|regex:/^#[0-9A-Fa-f]{6}$/',
            'exit_on_double_click' => 'nullable|in:0,1',
            'exit_on_double_click_message' => 'nullable|string|max:255',
            'exit_on_double_click_confirm_btn_text' => 'nullable|string|max:255',
            'exit_on_double_click_cancel_btn_text' => 'nullable|string|max:255',
            'allow_bottom_over_scroll' => 'nullable|in:0,1',
            'circle_loader_gif_img_file' => 'nullable|image|max:2048|mimes:gif',
        ]);
        // Lấy hoặc tạo bản ghi tùy chỉnh
        $customization = $app->customizations ?? new AppCustomization(['app_id' => $app->id]);

        // Chuẩn bị dữ liệu JSON
        $settings = $customization->settings ? json_decode($customization->settings, true) : [];
        foreach ($validated as $key => $value) {
            if ($key === 'circle_loader_gif_img_file' && $request->hasFile('circle_loader_gif_img_file')) {
                // Xóa file cũ nếu tồn tại
                if (!empty($settings['circle_loader_gif_img_file'])) {
                    Storage::delete($settings['circle_loader_gif_img_file']);
                }
                // Lưu file mới
                $path = $request->file('circle_loader_gif_img_file')->store('customization/gif', 'public');
                $settings[$key] = $path; // Lưu đường dẫn file
            } elseif ($value !== null) {
                $settings[$key] = $value;
            }
        }

        // Lưu dữ liệu
        $customization->settings = json_encode($settings);
        $customization->save();

        return redirect()->back()->with('success', 'Customization updated successfully.');
    }
}
