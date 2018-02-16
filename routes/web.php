<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

use App\Models\Part;

Route::get('/','HomeController@index');

Route::get('welcome/{name?}/{lastname?}', 'WelcomeController@welcome')

/*
->where([
	'name' => '[a-zA-Z]+',
	'lastname' => '[a-zA-Z]+',
	'age' => '[0-9]{1,3}',

])
*/
;

Route::get('/parts',function(){
	return Part::all();


});