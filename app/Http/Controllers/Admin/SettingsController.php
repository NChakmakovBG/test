<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * The settings groups and their keys.
     */
    protected array $groups = [
        'general' => [
            'site_name',
            'site_description',
            'site_logo',
            'favicon',
        ],
        'contact' => [
            'contact_email',
            'contact_phone',
            'contact_address',
        ],
        'social' => [
            'social_facebook',
            'social_twitter',
            'social_linkedin',
            'social_instagram',
        ],
        'seo' => [
            'google_analytics',
            'default_meta_title',
            'default_meta_description',
        ],
    ];

    public function index()
    {
        $settingsGrouped = SiteSetting::all()->groupBy('group');

        return view('admin.settings.index', compact('settingsGrouped'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'settings'   => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        foreach ($data['settings'] as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
