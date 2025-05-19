<?php

namespace App\Http\Controllers;

use App\Helpers\SettingsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request, $locale)
    {
        // Check if multilingual is enabled
        $multilingual = SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';
        
        if ($isMultilingual) {
            // Check if the locale is valid
            $availableLanguages = json_decode(SettingsHelper::get('available_languages', '{"en":"English","id":"Indonesian"}'), true);
            if (array_key_exists($locale, $availableLanguages)) {
                Session::put('locale', $locale);
            }
        }
        
        return redirect()->back();
    }
}
