<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //
    protected $primaryKey = 'part_num';
	protected $keyType = 'string';
	public $incrementing = false;

    //convenzione getNomeattribute
    public function getPathAttribute(){
    	$url = $this->part_img_url;
    	if(stristr($this->part_img_url, 'http') === false){
    		$url = 'storage/'.$this->part_img_url;
		}
		return $url;
    }


}
