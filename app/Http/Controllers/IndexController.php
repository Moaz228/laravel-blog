<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return view('index', ["pageTitle" => "Home"]);
    }

    function about()
    {
        return view('about', ["pageTitle" => "About"]);
    }

    function contact()
    {
        return view('contact', ["pageTitle" => "Contact"]);
    }
}
