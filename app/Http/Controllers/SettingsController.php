<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Throwable;

class SettingsController extends Controller
{
    use ImageUploadTrait;
    public function settings()
    {
        $settings = Settings::first();
        return view('backend.pages.settings.update', compact('settings'));
    }

    public function settingsSave(Request $request, $id)
    {
        try {
            $this->validateSettings($request);
            $settings = $this->updateSettings($request, $id);
            if ($request->hasFile('website_logo')) {
                $this->updateLogo($settings, $request->file('website_logo'));
            }
            return redirect()->route('settings')->with('success', 'Settings Updated Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // Separate method for validation
    private function validateSettings(Request $request)
    {
        $request->validate([
            'website_name' => 'required',
            'about_us' => 'required',
            'privacy_policy' => 'required',
            'terms_and_conditions' => 'required',
            'website_email' => 'required',
            'website_logo' => 'nullable',
            'website_copy_right_text' => 'required',
        ]);
    }
    private function updateSettings(Request $request, $id)
    {
        $settings = Settings::findOrFail($id);
        $settings->website_name = $request->website_name;
        $settings->about_us = $request->about_us;
        $settings->privacy_policy = $request->privacy_policy;
        $settings->terms_and_conditions = $request->terms_and_conditions;
        $settings->website_email = $request->website_email;
        $settings->website_copy_right_text = $request->website_copy_right_text;
        $settings->save();

        return $settings;
    }

    private function updateLogo($settings, $logoFile)
    {
        $settings->website_logo = $this->uploadImage($logoFile, '/uploads/');
        $settings->save();
    }

    private function uploadImage($file, $path)
    {
        return $file->store($path, 'public');
    }

}
