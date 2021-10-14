<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function home()
    {
        $title = 'Home';

        return view('home', compact('title'));
    }
}
