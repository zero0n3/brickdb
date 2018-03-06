<?php

namespace App\Http\Controllers;

use App\Models\Inventory_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InventoryListsController extends Controller
{
    //
	public function index(Request $req){
		//$queryBuilder = DB::table('inventory_lists')->orderBy('id', 'desc');
		//
		// usando la classe il primo metodo DEVE ESSERE STATICO quindi usando i 2punti ::
		$queryBuilder = Inventory_list::orderBy('id', 'desc');
		if ($req->has('id')){

			$queryBuilder->where('id','=',$req->input('id'));
		}

		$inventory_lists = $queryBuilder->get();
		//return Inventory_list::All();
		//$inventory_lists = Inventory_list::All();
		return view('inventory.inventory', ['inventory_lists' => $inventory_lists]);
	}

	public function delete( $id ){
        
        //metodo 1
        //$resu = Inventory_list::where('id', $id)->delete();
        
        //METODO 2 CON FIND
        $inventory = Inventory_list::find($id);
        $resu = $inventory->delete();

        //$sql = 'DELETE from inventory_lists WHERE id = :id';
        //qui devo dare il return del db delete così da catturarlo in ajax 
        //e testarlo per eliminare la riga
        //return DB::delete($sql, ['id' => $id]);
       	return '' . $resu;
        //return redirect()->back();
	}

	
	public function show($id){
		
		$resu = Inventory_list::where('id','=', $id)->orderBy('id','desc')->get();
		return $resu;
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

		/* METODO 1
		$resu = Inventory_list::where('id', $id)->update(
			[
				'list_name' => request()->input('list_name'),
			]
		);*/

		// METODO 2 CON FIND
		$inventory = Inventory_list::find($id);
		$inventory->list_name = request()->input('list_name');
		if($req->hasFile('inv_thumb')){
			$file = $req->file('inv_thumb');
			if($file->isValid()){
				//qui gli indico io il file system per questo file oppure cambio il default da local a public e non c'è + bisogno di dichiararll
				//$fileName = $file->store(env('IMG_THUMB_DIR'), 'public');
				//
				//$fileName = $file->store(env('IMG_THUMB_DIR'));
				//
				//oppure uso storeas e creo anche il nome file 
				$fileName = $id.'.'.$file->extension();
				$file->storeAs(env('INVE_THUMB_DIR'), $fileName);
				$inventory->inv_thumb = env('INVE_THUMB_DIR').$fileName;	
			}
			
		}
		$resu = $inventory->save();



/*
		$data = request()->only('list_name');
		$data['id'] = $id;
		$sql = "UPDATE inventory_lists SET list_name = :list_name WHERE id = :id";
		$res = DB::update($sql, $data);
*/
/*

		$inventory_list = Inventory_list::find($id);
		$inventory_list->list_name = request()->input('inventory_name');
		

		$res = $inventory_list->save();
*/
		
		$messaggio = $resu ? 'inventory con id ' .$id. ' aggiornata' : 'Inventory ' .$id. ' non aggiornata';

		session()->flash('message', $messaggio);
		return redirect()->route('inventory');

	}

	public function create(){
		
		return view('inventory.createinventory');

	}

	public function save(Request $req){
		
		/*
		$resu = Inventory_list::insert(
			[
				'list_name' => request()->input('list_name'),
				'user_id' => 2,
			]
		);
		*/

		/*
		//metodo alternativo per creare un record - create
		//con il create dobbiamo dirgli quali campi sono scrivibili per proteggere gli altri
		//quindi metodo PIù SICURO dell'insert
		$resu = Inventory_list::create(
			[
				'list_name' => request()->input('list_name'),
				'user_id' => 2,
			]
		);*/

		//METODO 3 CON L'ISTANZA
		$inventory = new Inventory_list();
		$inventory->list_name = request()->input('list_name');
		if($req->hasFile('inv_thumb')){
			$file = $req->file('inv_thumb');
			if($file->isValid()){
				//qui gli indico io il file system per questo file oppure cambio il default da local a public e non c'è + bisogno di dichiararll
				//$fileName = $file->store(env('IMG_THUMB_DIR'), 'public');
				//
				//$fileName = $file->store(env('IMG_THUMB_DIR'));
				//
				//oppure uso storeas e creo anche il nome file 
				$fileName = 'new_inv.'.$file->extension();
				$file->storeAs(env('INVE_THUMB_DIR'), $fileName);
				$inventory->inv_thumb = env('INVE_THUMB_DIR').$fileName;	
			}
			
		}		
		$inventory->user_id = 2;
		$resu = $inventory->save();

/*
		$data = request()->only('list_name');
		$data['user_id'] = 2;
		
      	$sql = 'INSERT INTO inventory_lists (list_name, user_id)';
      	$sql .= ' VALUES (:list_name, :user_id)';
      	
      	$res = DB::insert($sql, $data);
*/
		$messaggio = $resu ? 'Inventory ' .request()->input('list_name'). ' inserita' : 'Inventory ' .request()->input('list_name'). ' non inserita';

		session()->flash('message', $messaggio);
		return redirect()->route('inventory');
	}
}
