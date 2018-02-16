<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PageController extends Controller
{

	protected $data = [
		[
			'name' => 'simone',
			'lastname' => 'bissi' 
		],
		[
			'name' => 'aurora',
			'lastname' => 'placci' 
		],
		[
			'name' => 'andrea',
			'lastname' => 'rossi' 
		],


	];

    //
    public function about() {
    	return view('about');
    	//return View::make('about');
    	
    }

    public function staff() {

    	/*metodo 1 per passare dati a una vista
    	return view('staff',
    	[
    		'title' => 'Our staff',
    		'staff' => $this->data
    	]);
    	*/
    	
    	//metodo 2 per passare dati a una vista se ne devo passare pochi altrimenti
    	//uso metodo 1 
    	/*
    	return view('staff')
    		->with('staff', $this->data)
    		->with('title', 'modo 2 our staff');
    	*/

    	//metodo eloquent 3 con lettera maiuscola nel metodo
    	/*
    	return view('staff')
    		->withStaff($this->data)
    		->withTitle('nostro staff eloquent');
    	*/

    	//metodo 4 con funzione php compact
    	//compact crea array con chiavi title e staff e cerca variabili con quel nome
    	$staff = $this->data;
    	$title = 'our staff compact';
    	return view('staffb', compact('title', 'staff'));
    	
    }

    public function blog() {

        $staff = $this->data;
        $title = 'our staff compact';
        return view('blog', compact('title', 'staff'));
        
    }
}