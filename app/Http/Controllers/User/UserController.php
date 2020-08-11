<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Traits\LocalizationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{

    use LocalizationTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'Dashboard';
        return view('user.pages.dashboard')->with('page_title', $page_title);
    }

    public function setLocale($locale){
        Session::put('locale', $locale);
        return view('user.auth.register');
    }
}
