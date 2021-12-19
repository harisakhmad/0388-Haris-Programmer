<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'research';
    protected $guarded = ['id'];

    public function latesImage(){
        return $this->hasOne('App\Models\ImageProduct','product_id','id')->latest();
    }
    public function fileRelation(){
        return $this->hasMany('App\Models\ImageProduct','product_id','id');
    }
}
