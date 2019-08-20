<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function show($id, $r_type = 'test')
    {
        return "Product Id: $id, Type: $r_type";
    }
}
