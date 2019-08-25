<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'products';
    //protected $fillable = ['name', 'slug', 'price'];
    protected $guarded = [];
    
    public function categories() {
        return $this->belongsToMany('App\Category', 'product_categories');
    }
}
