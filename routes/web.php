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
use App\Http\Controllers\PartListController;
use App\Models\Part;
use Illuminate\Support\Facades\DB;

//home
Route::get('/','HomeController@index');

//part list per recupero foto
Route::get('/partlist','PartListController@home');

//inventory lists
Route::get('/inventory', 'InventoryListsController@index')->name('inventory');
Route::get('/inventory/{inventory_list_id}/edit', 'InventoryListsController@edit');
Route::get('/inventory/{inventory_list_id}', 'InventoryListsController@show')->where('inventory_list_id', '[0-9]+');
Route::get('/inventory/create', 'InventoryListsController@create')->name('create.inventory');
Route::delete('/inventory/{inventory_list_id}','InventoryListsController@delete');
Route::patch('/inventory/{inventory_list_id}', 'InventoryListsController@store');
Route::post('/inventory', 'InventoryListsController@save')->name('inventory.save');

Route::get('usernoinventory', function(){
	$usernoinventory = DB::table('users as u')
							->leftJoin('inventory_lists as i', 'u.id', 'i.user_id')
							->select('u.id', 'email', 'name', 'i.list_name')
							->whereNull('i.list_name')
							->get();
	return $usernoinventory;
	
});

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