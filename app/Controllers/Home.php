<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (auth()->loggedIn() && auth()->user()->inGroup('admin')) 
        {
        return view('admin/index');
        }
        return view('welcome_message');
    }
}
