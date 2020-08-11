<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:moderator');
    }

    public function index()
    {
        $page_title = 'Dashboard Moderator';
        return view('moderator.pages.dashboard')->with('page_title', $page_title);
    }
}
