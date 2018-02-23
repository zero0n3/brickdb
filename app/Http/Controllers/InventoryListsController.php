<?php

namespace App\Http\Controllers;

use App\Models\Inventory_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class InventoryListsController extends Controller
{
    //
	public function index(){
		//return Inventory_list::All();
		$inventory_lists = Inventory_list::All();
		return view('inventory.inventory', ['inventory_lists' => $inventory_lists]);
	}

	public function delete( $id ){
        
        $sql = 'DELETE from inventory_lists WHERE id = :id';
        
        //qui devo dare il return del db delete così da catturarlo in ajax 
        //e testarlo per eliminare la riga
        return DB::delete($sql, ['id' => $id]);
       
        //return redirect()->back();
	}

	
	public function show($id){
		
		return Inventory_list::All()->where('id','=', $id);

		//return view('inventory', ['inventory_lists' => $inventory_lists]);
	}


	public function edit($id){
		
        //dd($id);
        //$sql = 'SELECT id, album_name, description from albums WHERE ID = :id';
        //$album = DB::select($sql, ['id'=>$id]);
        $inventory_list = Inventory_list::find($id);
        return view('inventory.edit')->with('inventory_list', $inventory_list);
	}

	public function store($id, Request $req){
		
		$data = request()->only(['inventory_name','']);
		dd($data);

	}
}
