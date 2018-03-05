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

}
