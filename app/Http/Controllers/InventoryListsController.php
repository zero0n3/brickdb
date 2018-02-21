<?php

namespace App\Http\Controllers;

use App\Models\Inventory_list;
use Illuminate\Http\Request;

class InventoryListsController extends Controller
{
    //
	public function index(){
		return Inventory_list::All();
		//
		//$sql = 'SELECT * FROM ';
	}
}
