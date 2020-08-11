<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

trait LocalizationTrait {

    public function setLocale($locale){
        App::setlocale($locale);
        Session::put('locale', $locale);
        return redirect('/admin');
    }

}
