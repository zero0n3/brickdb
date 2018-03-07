<?php

namespace App\Models;

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
}
