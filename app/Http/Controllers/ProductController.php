<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function show($id, $r_type = 'test')
    {
        //return "Product Id: $id, Type: $r_type";
        //return view('product', ['id'=> $id, 'name'=> 'Product 1', 'r_type'=> $r_type]);
        
        $name = 'Product 1';
        
        $categories = ['Category 1', 'Category 2', 'Category 3'];
        
        return view('product', compact('id', 'name', 'r_type', 'categories'));
        
        //return view('product')->with('id', $id)->with('name', $name)->with('r_type', $r_type);
    }
}
