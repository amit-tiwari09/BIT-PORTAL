<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    // Show the settings form
    public function edit()
    {
        $settings = SiteSetting::getSettings();
        return view('site-settings.edit', compact('settings'));
    }

    // Update a specific setting (e.g., logo)
    public function update(Request $request, $key)
    {







        if ($key === 'logo' && $request->hasFile('logo')) {

            $data =  $request->validate([
                'logo' => 'sometimes|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $file = $request->file('logo');

            // Generate a unique name for the file
            $uniqueName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();


            $file->move(public_path('pictures'), $uniqueName);


            SiteSetting::updateSetting('logo', $uniqueName);
        } else {
            $data = $request->validate([
                'value' => 'required|string',
            ]);

            SiteSetting::updateSetting($key, $data['value']);
        }

        return redirect()->back()->with('success', 'Setting updated successfully!');
    }
}
