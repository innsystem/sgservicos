<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
// use App\Integrations\GoogleAnalyticsIntegration;

class BaseAdminController extends Controller
{
    public function index()
    {
        $pagesCount = Page::count();
        $servicesCount = Service::count();
        $testimonialsCount = Testimonial::count();
        $teamsCount = Team::count();

        return view('admin.pages.home', compact('pagesCount', 'servicesCount', 'testimonialsCount', 'teamsCount'));
    }

    public function settings()
    {
        $getSetting = new Setting;

        $result = [
            'logo' => $getSetting->getValue(('logo')),
            'favicon' => $getSetting->getValue(('favicon')),
            'meta_title' => $getSetting->getValue(('meta_title')),
            'meta_keywords' => $getSetting->getValue(('meta_keywords')),
            'meta_description' => $getSetting->getValue(('meta_description')),
            'script_head' => $getSetting->getValue(('script_head')),
            'script_body' => $getSetting->getValue(('script_body')),
            'site_name' => $getSetting->getValue(('site_name')),
            'site_proprietary' => $getSetting->getValue(('site_proprietary')),
            'site_document' => $getSetting->getValue(('site_document')),
            'site_email' => $getSetting->getValue(('site_email')),
            'whatsapp' => $getSetting->getValue(('whatsapp')),
            'telephone' => $getSetting->getValue(('telephone')),
            'telephone_fixo' => $getSetting->getValue(('telephone_fixo')),
            'cellphone' => $getSetting->getValue(('cellphone')),
            'cellphone_other' => $getSetting->getValue(('cellphone_other')),
            'address' => $getSetting->getValue(('address')),
            'hour_open' => $getSetting->getValue(('hour_open')),
            'client_id' => $getSetting->getValue(('client_id')),
            'client_secret' => $getSetting->getValue(('client_secret')),
            'facebook' => $getSetting->getValue(('facebook')),
            'instagram' => $getSetting->getValue(('instagram')),
            'twitter' => $getSetting->getValue(('twitter')),
            'youtube' => $getSetting->getValue(('youtube')),
            'link_payment_lp_1' => $getSetting->getValue(('link_payment_lp_1')),
            'script_head_lp' => $getSetting->getValue(('script_head_lp')),
            'script_body_lp' => $getSetting->getValue(('script_body_lp')),
        ];

        return view('admin.pages.settings', compact('result'));
    }

    public function settingsUpdate(Request $request)
    {
        $settings = $request->all();

        foreach ($settings as $key => $value) {
            // Exception Logo AND Favicon
            if ($key != 'logo' && $key != 'favicon') {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        try {
            Cache::forget('settings');
        } catch (\Exception $e) {
            \Log::error('BaseAdminController :: settingsUpdate' . $e->getMessage());
            return response()->json($e->getMessage(), 500);
        }

        return response()->json('Configurações atualizadas com sucesso', 200);
    }

    public function updateImages(Request $request)
    {
        $pathResponse = '';

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $logoPath]
            );

            $pathResponse = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $faviconPath]
            );

            $pathResponse = $faviconPath;
        }

        try {
            Cache::forget('settings');
        } catch (\Exception $e) {
            \Log::error('BaseAdminController :: settingsUpdate' . $e->getMessage());
            return response()->json($e->getMessage(), 500);
        }

        return response()->json(asset('storage/' . $pathResponse), 200);
    }
}
