<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AppSettingsController extends Controller
{
    //
    public function edit(App $app)
    {
        // $this->authorize('view', $app); // kiểm tra quyền sở hữu nếu cần

        return view('dashboard.settings.edit',compact('app'));
    }
    public function update(Request $request, App $app)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'website_url' => 'required|url',
            'android_package_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'website_url', 'android_package_name']);

        // Xử lý ảnh nếu có upload
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($app->image) {
                Storage::delete('public/' . $app->image);
            }

            // Lưu ảnh mới
            $path = $request->file('image')->store('apps', 'public');
            $data['image'] = $path;
        }

        $app->update($data);

        return back()->with('success', 'Cập nhật thành công');
    }
    public function editScreen(App $app)
    {
        $this->authorize('view', $app); // kiểm tra quyền sở hữu nếu cần
        $splash = $app->splashScreen; // assuming hasOne

        return view('dashboard.settings.edit-screen', compact('app', 'splash'));
    }
    public function updateScreen(App $app, Request $request)
    {


        $validated = $request->validate([
            'enable_splash_logo' => 'required|boolean',
            'splash_logo_flie' => 'nullable|file|image|mimes:jpg,jpeg,png,svg|max:2048',
            'splash_logo_width' => 'nullable|integer',

            'splash_bg_color' => 'required|string',
            'splash_change_in_dark_mode' => 'required|boolean',
            'splash_bg_color_dark' => 'nullable|string',

            'enable_splash_bg_img' => 'required|boolean',
            'splash_bg_img_type' => 'required|in:1,2',
            'splash_bg_img_file' => 'nullable|file|image|mimes:jpg,jpeg,png,svg|max:4096',
            'splash_bg_gif_img_file' => 'nullable|file|mimes:gif,json|max:5000',

            'splash_timeout' => 'required|integer',

            'splash_status_bar_use_default' => 'required|boolean',
            'splash_status_bar_bg_color' => 'required|string',
            'splash_status_bar_icon_color' => 'required|in:1,2',


        ]);

        // Nếu chưa có bản ghi splashScreen -> tạo mới
        $splash = $app->splashScreen;
        if (!$splash) {
            $splash = $app->splashScreen()->create([
                'show_logo' => false,
                'logo_path' => null,
            ]);
        }

        // Upload logo nếu có
        // if ($request->hasFile('splash_logo_flie')) {
        //     if ($splash->logo_path) {
        //         Storage::disk('public')->delete($splash->logo_path);
        //     }
        //     $splash->logo_path = $request->file('splash_logo_flie')->store('splash/logo', 'public');
        // }
        if ($request->hasFile('splash_logo')) {
            // Ưu tiên dùng file upload
            if ($splash->logo_path) {
                Storage::disk('public')->delete($splash->logo_path);
            }
            $splash->logo_path = $request->file('splash_logo')->store('splash/logo', 'public');
        } elseif ($request->filled('splash_logo') && Str::startsWith($request->splash_logo, 'data:image')) {
            // Xử lý ảnh base64 từ input hidden
            [$type, $data] = explode(';', $request->splash_logo);
            [, $data] = explode(',', $data);
            $decodedImage = base64_decode($data);
            $imageName = 'splash_logo_' . time() . '.png';
            Storage::disk('public')->put("splash/logo/{$imageName}", $decodedImage);
            $splash->logo_path = "splash/logo/{$imageName}";
        }


        // Upload ảnh nền nếu có
        if ($request->hasFile('splash_bg_img_file')) {
            // if ($splash->background_image_path) {
            //     Storage::disk('public')->delete($splash->background_image_path);
            // }
            $splash->background_image_path = $request->file('splash_bg_img_file')->store('splash/bg', 'public');
        }

        // Upload gif nếu có
        if ($request->hasFile('splash_bg_gif_img_file')) {
            // if ($splash->background_gif_path) {
            //     Storage::disk('public')->delete($splash->background_gif_path);
            // }
            $splash->background_gif_path = $request->file('splash_bg_gif_img_file')->store('splash/gif', 'public');
        }

        // Cập nhật các trường dữ liệu
        $splash->show_logo = $validated['enable_splash_logo'];
        $splash->logo_size = $validated['splash_logo_width'];

        $splash->background_color = $validated['splash_bg_color'];
        $splash->background_dark_mode = $validated['splash_change_in_dark_mode'];
        $splash->splash_bg_color_dark = $validated['splash_bg_color_dark'];

        $splash->use_background_image = $validated['enable_splash_bg_img'];
        $splash->background_type = $validated['splash_bg_img_type'];


        $splash->splash_timeout = $validated['splash_timeout'];

        $splash->splash_status_bar_use_default = $validated['splash_status_bar_use_default'];
        $splash->splash_status_bar_bg_color = $validated['splash_status_bar_bg_color'];
        $splash->splash_status_bar_icon_color = $validated['splash_status_bar_icon_color'];



        $splash->save();

        return redirect()->back()->with('success', 'Cập nhật giao diện splash thành công!');
    }
}
