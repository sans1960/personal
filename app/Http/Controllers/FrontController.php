<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');

    }

    public function home()
    {
        return view('front.home');
    }

 
}
