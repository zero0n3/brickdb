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

use App\Http\Controllers\InventoryListsController;
use App\Models\Part;

Route::get('/','HomeController@index');

//inventory lists
Route::get('/inventory', 'InventoryListsController@index');
Route::delete('/inventory/{inventory_list_id}','InventoryListsController@delete');
Route::get('/inventory/{inventory_list_id}', 'InventoryListsController@show');



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