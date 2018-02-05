<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function welcome($name = '', $lastname = '')
    {
    	return "<h1>welcome " . $name . ' ' . $lastname . '</h1>';
    }
}
