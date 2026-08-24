<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GENERAL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function general()
    {
        $settings = Setting::where('group', 'general')
            ->get()
            ->keyBy('key');

        return view('admin.settings.general', compact('settings'));
    }


    /*
    |--------------------------------------------------------------------------
    | SOCIAL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function social()
    {
        $settings = Setting::where('group', 'social')
            ->get()
            ->keyBy('key');

        return view('admin.settings.social', compact('settings'));
    }


    /*
    |--------------------------------------------------------------------------
    | MAIL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function mail()
    {
        $settings = Setting::where('group', 'mail')
            ->get()
            ->keyBy('key');

        return view('admin.settings.mail', compact('settings'));
    }


    /*
    |--------------------------------------------------------------------------
    | INTEGRATION SETTINGS
    |--------------------------------------------------------------------------
    */

    public function integration()
    {
        $settings = Setting::where('group', 'integration')
            ->get()
            ->keyBy('key');

        return view('admin.settings.integration', compact('settings'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ALL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function updateAll(Request $request)
    {
        $group = $request->input('group');

        /*
        |--------------------------------------------------------------------------
        | Validate Group
        |--------------------------------------------------------------------------
        */

        $allowedGroups = [
            'general',
            'social',
            'mail',
            'integration',
        ];

        if (! in_array($group, $allowedGroups)) {
            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | GENERAL
        |--------------------------------------------------------------------------
        */

        if ($group === 'general') {

            $request->validate([
                'app_name' => ['nullable', 'string', 'max:255'],

                'address' => ['nullable', 'string'],

                'email' => ['nullable', 'email', 'max:255'],

                'secondary_email' => ['nullable', 'email', 'max:255'],

                'phone_1' => ['nullable', 'string', 'max:50'],

                'phone_2' => ['nullable', 'string', 'max:50'],

                'whatsapp_number' => ['nullable', 'string', 'max:50'],

                'copyright_text' => ['nullable', 'string'],

                'logo' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,svg',
                    'max:2048',
                ],

                'favicon' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp,ico',
                    'max:1024',
                ],

                'og_image' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048',
                ],
            ]);


            $this->saveSetting(
                'app_name',
                $request->app_name,
                'string',
                'general'
            );

            $this->saveSetting(
                'address',
                $request->address,
                'text',
                'general'
            );

            $this->saveSetting(
                'email',
                $request->email,
                'string',
                'general'
            );

            $this->saveSetting(
                'secondary_email',
                $request->secondary_email,
                'string',
                'general'
            );

            $this->saveSetting(
                'phone_1',
                $request->phone_1,
                'string',
                'general'
            );

            $this->saveSetting(
                'phone_2',
                $request->phone_2,
                'string',
                'general'
            );

            $this->saveSetting(
                'whatsapp_number',
                $request->whatsapp_number,
                'string',
                'general'
            );

            $this->saveSetting(
                'copyright_text',
                $request->copyright_text,
                'text',
                'general'
            );


            /*
            |--------------------------------------------------------------------------
            | Logo
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('logo')) {

                $this->deleteOldImage('logo');

                $path = $request->file('logo')
                    ->store('settings', 'public');

                $this->saveSetting(
                    'logo',
                    $path,
                    'image',
                    'general'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Favicon
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('favicon')) {

                $this->deleteOldImage('favicon');

                $path = $request->file('favicon')
                    ->store('settings', 'public');

                $this->saveSetting(
                    'favicon',
                    $path,
                    'image',
                    'general'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | OG Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('og_image')) {

                $this->deleteOldImage('og_image');

                $path = $request->file('og_image')
                    ->store('settings', 'public');

                $this->saveSetting(
                    'og_image',
                    $path,
                    'image',
                    'general'
                );
            }


            return redirect()
                ->route('admin.settings.general')
                ->with('success', 'General settings updated successfully.');
        }


        /*
        |--------------------------------------------------------------------------
        | SOCIAL
        |--------------------------------------------------------------------------
        */

        if ($group === 'social') {

            $request->validate([
                'facebook' => ['nullable', 'url', 'max:500'],

                'instagram' => ['nullable', 'url', 'max:500'],

                'whatsapp' => ['nullable', 'url', 'max:500'],

                'messenger' => ['nullable', 'url', 'max:500'],

                'tiktok' => ['nullable', 'url', 'max:500'],

                'twitter' => ['nullable', 'url', 'max:500'],

                'linkedin' => ['nullable', 'url', 'max:500'],
            ]);


            $socials = [
                'facebook',
                'instagram',
                'whatsapp',
                'messenger',
                'tiktok',
                'twitter',
                'linkedin',
            ];


            foreach ($socials as $key) {

                $this->saveSetting(
                    $key,
                    $request->input($key),
                    'url',
                    'social',
                    true
                );
            }


            return redirect()
                ->route('admin.settings.social')
                ->with('success', 'Social media settings updated successfully.');
        }


        /*
        |--------------------------------------------------------------------------
        | MAIL
        |--------------------------------------------------------------------------
        */

        if ($group === 'mail') {

            $request->validate([
                'sender_name' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'sender_email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'recipient_email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'mail_host' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'smtp_username' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'smtp_password' => [
                    'nullable',
                    'string',
                    'max:500',
                ],

                'mail_port' => [
                    'nullable',
                    'integer',
                ],

                'mail_encryption' => [
                    'nullable',
                    'in:tls,ssl',
                ],
            ]);


            $this->saveSetting(
                'sender_name',
                $request->sender_name,
                'string',
                'mail'
            );

            $this->saveSetting(
                'sender_email',
                $request->sender_email,
                'email',
                'mail'
            );

            $this->saveSetting(
                'recipient_email',
                $request->recipient_email,
                'email',
                'mail'
            );

            $this->saveSetting(
                'mail_host',
                $request->mail_host,
                'string',
                'mail'
            );

            $this->saveSetting(
                'smtp_username',
                $request->smtp_username,
                'string',
                'mail'
            );


            /*
            |--------------------------------------------------------------------------
            | SMTP Password
            |--------------------------------------------------------------------------
            */

            if ($request->filled('smtp_password')) {

                $this->saveSetting(
                    'smtp_password',
                    encrypt($request->smtp_password),
                    'password',
                    'mail'
                );
            }


            $this->saveSetting(
                'mail_port',
                $request->mail_port,
                'integer',
                'mail'
            );

            $this->saveSetting(
                'mail_encryption',
                $request->mail_encryption,
                'string',
                'mail'
            );


            return redirect()
                ->route('admin.settings.mail')
                ->with('success', 'Mail settings updated successfully.');
        }


        /*
        |--------------------------------------------------------------------------
        | INTEGRATION
        |--------------------------------------------------------------------------
        */

        if ($group === 'integration') {

            $request->validate([
                'google_captcha_site_key' => [
                    'nullable',
                    'string',
                    'max:500',
                ],

                'google_captcha_secret_key' => [
                    'nullable',
                    'string',
                    'max:500',
                ],

                'google_tag_manager_header_code' => [
                    'nullable',
                    'string',
                ],

                'google_tag_manager_body_code' => [
                    'nullable',
                    'string',
                ],

                'facebook_pixel_code' => [
                    'nullable',
                    'string',
                ],

                'tawk_chat_link' => [
                    'nullable',
                    'url',
                    'max:500',
                ],
            ]);


            $this->saveSetting(
                'google_captcha_site_key',
                $request->google_captcha_site_key,
                'string',
                'integration'
            );


            /*
            |--------------------------------------------------------------------------
            | reCAPTCHA Secret
            |--------------------------------------------------------------------------
            */

            if ($request->filled('google_captcha_secret_key')) {

                $this->saveSetting(
                    'google_captcha_secret_key',
                    encrypt($request->google_captcha_secret_key),
                    'password',
                    'integration'
                );
            }


            $this->saveSetting(
                'google_tag_manager_header_code',
                $request->google_tag_manager_header_code,
                'code',
                'integration'
            );

            $this->saveSetting(
                'google_tag_manager_body_code',
                $request->google_tag_manager_body_code,
                'code',
                'integration'
            );

            $this->saveSetting(
                'facebook_pixel_code',
                $request->facebook_pixel_code,
                'code',
                'integration'
            );

            $this->saveSetting(
                'tawk_chat_link',
                $request->tawk_chat_link,
                'url',
                'integration'
            );


            return redirect()
                ->route('admin.settings.integration')
                ->with('success', 'Integration settings updated successfully.');
        }


        abort(404);
    }


    /*
    |--------------------------------------------------------------------------
    | SAVE SETTING HELPER
    |--------------------------------------------------------------------------
    */

    private function saveSetting(
        string $key,
        $value,
        string $type,
        string $group,
        bool $isPublic = false
    ): void {

        Setting::updateOrCreate(
            [
                'key' => $key,
            ],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'is_public' => $isPublic,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE OLD IMAGE
    |--------------------------------------------------------------------------
    */

    private function deleteOldImage(string $key): void
    {
        $setting = Setting::where('key', $key)->first();

        if (
            $setting &&
            $setting->value &&
            Storage::disk('public')->exists($setting->value)
        ) {
            Storage::disk('public')->delete($setting->value);
        }
    }
}