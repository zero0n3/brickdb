<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory_list extends Model
{
    //
    //
    protected $primaryKey = 'id';
    protected $fillable = ['list_name', 'user_id'];
}
