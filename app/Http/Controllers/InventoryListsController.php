<?php

namespace App\Http\Controllers;

use App\Models\Inventory_list;
use Illuminate\Http\Request;


class InventoryListsController extends Controller
{
    //
	public function index(){
		//return Inventory_list::All();
		$inventory_lists = Inventory_list::All();
		return view('inventory', ['inventory_lists' => $inventory_lists]);
	}

	public function delete( $id ){
        
        $sql = 'DELETE from inventory_lists WHERE id= :id';
        dd($sql);
        return DB::delete($sql, ['id' => $id]);
       
        return redirect()->back();
	}
}
