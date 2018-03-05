<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Image;

class PartListController extends Controller
{
	public function home(Request $req){
		
		//prima recupero le parti e testo poi solo quelle con la colonna img vuota
		// in modo da lavorare per il discorso delle API rebrick solo quelle mancanti
		$queryBuilder = Part::orderBy('part_num', 'asc');

		$parts = $queryBuilder->get();

		$client = new Client();

		foreach ($parts as $part) {
			if (empty($part->part_img_url)){
				$res = $client->request('GET', 'https://rebrickable.com/api/v3/lego/parts/'.$part->part_num.'/', [
						'query' => ['key' => 'BzyyfQneul']
					]);
				
				$part_img_url = $res->getBody();
		        
		        // usage inside a laravel route
				$img = Image::make(json_decode($part_img_url)->part_img_url);
				$img->save('storage/images/parts/'.basename(json_decode($part_img_url)->part_img_url));
				
				//identifico il record da aggiornare
				$part_to_update = Part::find($part->part_num);
				//indico la modifica da apportare
				$part_to_update->part_img_url = env('PART_IMG').$img->basename;
				//e aggiorno il record della collection contestualmente
				$part->part_img_url = env('PART_IMG').$img->basename;
				//salvo il record su db
				$resu = $part_to_update->save();

			}
		}

		return view('part.part', ['parts' => $parts]);

	}
	
	public function edit($part_num){
		
        //dd($id);
        //$sql = 'SELECT id, album_name, description from albums WHERE ID = :id';
        //$album = DB::select($sql, ['id'=>$id]);
        $part = Part::find($part_num);
        return view('part.edit')->with('part', $part);
	}
	
	public function store($part_num, Request $req){
		// METODO 2 CON FIND
		$part = Part::find($part_num);
		$part->name = request()->input('name');
		$part->part_cat_id = request()->input('part_cat_id');
		
		if($req->hasFile('part_img')){
			$file = $req->file('part_img');
			if($file->isValid()){
				//uso storeas e creo anche il nome file 
				$fileName = request()->input('_filename');
				$file->storeAs(env('PART_IMG'), $fileName);
				//	aggiorno il percorso sul db
				$part->part_img_url = env('PART_IMG').$fileName;	
			}
		}
		
		$resu = $part->save();

		$messaggio = $resu ? 'Part con codice ' .$part_num. ' aggiornata' : 'Part con codice  ' .$part_num. ' NON AGGIORNATA';
		session()->flash('message', $messaggio);
		return redirect()->route('partlist');
	}
	
	public function delete( $part_num ){
        
        //metodo 1
        //$resu = Inventory_list::where('id', $id)->delete();
        
        //METODO 2 CON FIND
        $part = Part::find($part_num);
        $resu = $part->delete();

        //$sql = 'DELETE from inventory_lists WHERE id = :id';
        //qui devo dare il return del db delete così da catturarlo in ajax 
        //e testarlo per eliminare la riga
        //return DB::delete($sql, ['id' => $id]);
      	return '' . $resu;
        //return redirect()->back();

	}

}
