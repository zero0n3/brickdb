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
		
		//prima recupero le parti con la colonna delle immagini vuota
		// in modo da lavorare per il discorso delle API rebrick solo quelle mancanti
		// poi lancio il querybuilder globale
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
			//	$part_to_update = Part::find($part->part_num);
				//indico la modifica da apportare
			//	$part_to_update->part_img_url = env('PART_IMG').$img->basename;
				//salvo il record su db
			//	$resu = $part_to_update->save();

				//aggiorno anche la collection recuperata prima
				$parts = $parts->map(function ($item, $key) {
					return $item;
					
				});
				return $parts->all();



/*
				$parts->transform(function ($item, $key) {
					$item->part_num == 3008 ? $item->part_img_url = "ciaoness" : "";

					return [
						'part_num' => $item->part_num,
						'part_img_url' => $item->part_img_url
					];
				});
				return $parts->all();
*/
			}
		}

		// rilancio il get per recuperare i record aggiornati e passare i dati aggiornati alla view
		//$parts = Part::orderBy('part_num', 'asc')->get();
		//return view('part.part', ['parts' => $parts]);


	}
	/*
	public function index($id, Request $req){
		
		$client = new Client();
		$res = $client->request('GET', 'https://rebrickable.com/api/v3/lego/parts/3023/', [
				'query' => ['key' => 'BzyyfQneul']
			]);
		
		$part_img_url = $res->getBody();
        
        // usage inside a laravel route
		$img = Image::make(json_decode($part_img_url)->part_img_url);
		
		$img->save('storage/images/parts/'.basename(json_decode($part_img_url)->part_img_url));
		
		//nome file
		return $img->basename;

		$resu = Part::where('id','=', $id)->orderBy('id','desc')->get();
		//return $resu;
		//return view('inventory', ['inventory_lists' => $inventory_lists]);
	}

	public function home($id, Request $req){
		
		$queryBuilder = Part::orderBy('id', 'desc');
		if ($req->has('id')){
			$queryBuilder->where('id','=',$req->input('id'));
		}

		$parts = $queryBuilder->get();
		//return Inventory_list::All();
		//$inventory_lists = Inventory_list::All();
		return view('inventory.inventory', ['inventory_lists' => $inventory_lists]);
	}
	*/
}
