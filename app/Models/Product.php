<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = 'id';

    public function fileRelation(){
        $this->hasMany('App\Models\ImageProduct','product_id','id');
    }
}
