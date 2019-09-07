<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->apiResponse(ResultType::Success, Category::all(), 'Categories fetched', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    
        return $this->apiResponse(ResultType::Success, $category, 'Category created.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return $this->apiResponse(ResultType::Success, $category, 'Category fetched', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
    
        return $this->apiResponse(ResultType::Success, $category, 'Category updated.', 200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        return $this->apiResponse(ResultType::Success, null, 'Category deleted', 200);
    }
    
    public function custom1() {
        //return Category::pluck('id');
        //return Category::pluck('id', 'name');
        return Category::pluck('name', 'id');
    }
    
    public function report1() {
        return DB::table('product_categories as pc')
            ->selectRaw('c.name, COUNT(*) as total')
            ->join('categories as c', 'c.id', '=', 'pc.category_id')
            ->join('products as p', 'p.id', '=', 'pc.product_id')
            ->groupBy('c.name')
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }
}
