<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_title = 'Dashboard Admin';
        return view('admin.pages.dashboard')->with('page_title', $page_title);
    }
}
