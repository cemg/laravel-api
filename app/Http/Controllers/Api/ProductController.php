<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductWithCategoriesResource;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //return Product::all();
        //return response()->json(Product::all(), 200);
        //return response(Product::all(), 200);
        //return response(Product::paginate(10), 200);

        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $qb = Product::query()->with('categories');
        if ($request->has('q'))
            $qb->where('name', 'like', '%' . $request->query('q') . '%');

        if ($request->has('sortBy'))
            $qb->orderBy($request->query('sortBy'), $request->query('sort', 'DESC'));

        $data = $qb->offset($offset)->limit($limit)->get();

        $data = $data->makeHidden('slug');

        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$input = $request->all();
        //$product = Product::create($input);

        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->save();

        return $this->apiResponse(ResultType::Success, $product, 'Product created.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return $this->apiResponse(ResultType::Success, $product, 'Product Found.', 200);
        }
        catch(ModelNotFoundException $exception) {
            return $this->apiResponse(ResultType::Error, null, 'Product Not Found!', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        //$input = $request->all();
        //$product->update($input);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->save();

        return $this->apiResponse(ResultType::Success, $product, 'Product updated.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->apiResponse(ResultType::Success, null, 'Product deleted.', 200);
    }

    public function custom1()
    {
        //return Product::select('id', 'name')->orderBy('created_at', 'desc')->take(10)->get();
        return Product::selectRaw('id as product_id, name as product_name')
            ->orderBy('created_at', 'desc')->take(10)->get();
    }

    public function custom2()
    {
        $products = Product::orderBy('created_at', 'desc')->take(10)->get();

        $mapped = $products->map(function ($product) {
            return [
                '_id'           => $product['id'],
                'product_name'  => $product['name'],
                'product_price' => $product['price'] * 1.03
            ];
        });

        return $mapped->all();
    }

    public function custom3()
    {
        $products = Product::paginate(10);

        return ProductResource::collection($products);
    }

    public function listWithCategories()
    {
        $products = Product::with('categories')->paginate(10);

        return ProductWithCategoriesResource::collection($products);
    }
}
