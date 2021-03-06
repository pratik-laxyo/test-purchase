<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'item_number', 'description', 'unit_id', 'category_id', 'title', 'brand', 'department'
    ];

    public function brand_name(){
    	return $this->belongsTo('App\Brand', 'brand');
    }
    public function department_name(){
    	return $this->belongsTo('App\Department', 'department');
    }
    public function category(){
    	return $this->belongsTo('App\item_category', 'category_id');
    }
    public function unit(){
    	return $this->belongsTo('App\unitofmeasurement', 'unit_id');
    }

}
