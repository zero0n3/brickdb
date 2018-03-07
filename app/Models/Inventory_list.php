<?php

namespace App\Models;

use App\Models\Inventory_x_user;
use Illuminate\Database\Eloquent\Model;

class Inventory_list extends Model
{
    //
    //
    protected $primaryKey = 'id';
    protected $fillable = ['list_name', 'user_id', 'inv_thumb'];

    //convenzione getNomeattribute
    public function getPathAttribute(){
    	$url = $this->inv_thumb;
    	if(stristr($this->inv_thumb, 'http') === false){
    		$url = 'storage/'.$this->inv_thumb;
		}
		return $url;
    }

    //relazione fra inventory e lista parti x inventory
    public function invxuser(){  //INVentoryPerUser
        //per forzare il nome delle colonne da interlacciare fra di loro si fa così
        //return $this->hasMany(Inventory_x_user::class, 'album_id', 'id');
        return $this->hasMany(Inventory_x_user::class);

    }
}
