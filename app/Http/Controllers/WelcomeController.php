<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function welcome($name = '', $lastname = '', Request $req)
    {
    	$language = $req->input('lang');
    	$res = "<h1>welcome " . $name . ' ' . $lastname . ' ' . $language . '</h1>';
    	return $res;
    }
}
