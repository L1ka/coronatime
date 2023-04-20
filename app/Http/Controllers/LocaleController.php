<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function setLocale($locale): RedirectResponse
    {
        if (! in_array($locale, ['en', 'ka'])) {
            abort(403);
        }
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return back();
    }
}
