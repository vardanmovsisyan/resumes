<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_by_admin');
    }

    public function index()
    {
        return view('home');
    }
}
