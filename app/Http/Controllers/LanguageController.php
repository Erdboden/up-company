<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Terranet\Localizer\Models\Language;

class LanguageController extends Controller
{
    /**
     * Change language.
     *
     * @param  string $lang
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        $language = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
        session()->put('locale', $language);
        return back();
    }
}
