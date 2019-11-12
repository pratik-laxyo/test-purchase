<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'item_number', 'description', 'unit_id', 'category_id', 'location_id'
    ];
}
