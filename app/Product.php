<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Product
 *
 * @mixin \Eloquent
 */
class Product extends Model
{
    //protected $table = 'products';
    //protected $fillable = ['name', 'slug', 'price'];
    protected $guarded = [];
    //protected $hidden = ['slug'];
    
    public function categories() {
        return $this->belongsToMany('App\Category', 'product_categories');
    }
}
