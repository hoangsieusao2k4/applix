<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\AppAdvancedSetting;
use Illuminate\Http\Request;

class AdvancedSettingsController extends Controller
{
    //
    public function edit(App $app)
    {
        $settings = $app->advancedSettings?->settings ?? [];
    
        return view('dashboard.settings.advanced-settings', compact('app', 'settings'));
    }

    public function update(Request $request, App $app)
    {
        // dd($request->all());
        $validated = $request->validate([
            'enable_content_zoom' => 'required|in:0,1',
            'enable_text_selection' => 'required|in:0,1',
            'enable_screenshot' => 'required|in:0,1',
            'enable_resource_caching' => 'required|in:0,1',
            'enable_audio_video_autoplay' => 'required|in:0,1',
            'hide_loader_mechanism' => 'required|in:1,2',
            'hide_loader_on_percent_loaded' => 'nullable|integer|min:0|max:100',
            'custom_user_agent' => 'nullable|string|max:255',
            'allow_opening_popup_window' => 'required|in:0,1',
            'allow_background_audio_playing' => 'required|in:0,1',
            'module_status_notification_audio_controller' => 'required|in:0,1',
            'allow_in_app_file_downloading' => 'required|in:0,1',
            'file_download_started_text' => 'nullable|string|max:255',
            'file_download_completed_text' => 'nullable|string|max:255',
            'storage_plist_use_string' => 'nullable|string|max:255',
            'allow_in_app_camera_access' => 'required|in:0,1',
            'camera_plist_use_string' => 'nullable|string|max:255',
            'allow_in_app_microphone_access' => 'required|in:0,1',
            'microphone_plist_use_string' => 'nullable|string|max:255',
            'allow_in_app_location_access' => 'required|in:0,1',
            'location_plist_use_string' => 'nullable|string|max:255',
            'force_to_enable_location' => 'nullable|in:0,1',
            'force_to_enable_location_title' => 'nullable|string|max:255',
            'force_to_enable_location_description' => 'nullable|string|max:255',
            'force_to_enable_location_cancel' => 'nullable|string|max:255',
            'force_to_enable_location_allow' => 'nullable|string|max:255',
            'development_region_plist_string' => 'nullable|string|max:10',
            'allow_all_urls_contains_domain' => 'nullable|in:0,1',
            'open_external_url_only' => 'required|in:0,1,2',
            'allowed_external_urls' => 'nullable|string|max:5000',
        ]);

        $advancedSetting = $app->advancedSettings ?? new AppAdvancedSetting(['app_id' => $app->id]);
        $settings = $advancedSetting->settings ?? [];

        foreach ($validated as $key => $value) {
            $settings[$key] = $value;
        }

        $advancedSetting->settings = $settings;
        $advancedSetting->save();

        return redirect()->back()->with('success', 'Advanced settings updated successfully.');
    }
}
