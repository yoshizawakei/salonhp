<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function booking()
    {
        return view("booking");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect("/");
    }
}
