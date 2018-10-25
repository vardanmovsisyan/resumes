<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(($user = Auth::user()) && Auth::user()->verifiedByAdmin){
            return view('home');
        }
        return view('welcome');
    }
}
