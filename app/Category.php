<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product', 'product_categories');
    }
}
