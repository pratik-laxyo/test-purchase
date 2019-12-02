<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'item_number'
    ];

    public function item_name(){
    	return $this->hasOne('App\item', 'item_number', 'item_number');
    }
}
