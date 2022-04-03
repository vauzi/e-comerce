<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Product::latest()->get();
        return response()->json([
            'massage'   => 'Show product get all',
            'success'   => true,
            'data'      => ProductResource::collection($show)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $post = Product::create($request->all());
            return response()->json([
                'massage'   => 'product Created successfully',
                'success'   => true,
                'data'      => new ProductResource($post)
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Response Filed' . $e,
                'success'   => false
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Product::find($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'Data product not found',
                'success'   => false
            ], 404);
        }
        return response()->json([
            'massage'   => 'Show data product get by id',
            'success'   => true,
            'data'      => new ProductResource($show)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $show = Product::find($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'Data product not found',
                'success'   => false
            ], 404);
        }
        try {
            $update = $show->update($request->all());
            return response()->json([
                'massage'   => 'product Created successfully',
                'success'   => true,
                'data'      => new ProductResource($update)
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Response Filed' . $e,
                'success'   => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = Product::find($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'Data product not found',
                'success'   => false
            ], 404);
        }
        return response()->json([
            'massage'   => 'Product data successfully deleted',
            'success'   => true,
        ], 200);
    }
}
