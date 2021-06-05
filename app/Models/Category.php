<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_categories');
    }
}
