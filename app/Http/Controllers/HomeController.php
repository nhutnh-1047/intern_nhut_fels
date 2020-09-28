<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function updateProfile()
    {
        return view('auth.register');
    }
}
