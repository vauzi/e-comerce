<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Category::get();
        return response()->json([
            'massage'   => 'Show category get all',
            'success'   => true,
            'data'      => $show
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category'  => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $post = Category::create($request->all());
            return response()->json([
                'massage'   => 'Created Category successfully',
                'success'   => true,
                'data'      => $post
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Created Filed' . $e,
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
        $show = Category::find($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'request cannot respond',
                'success'   => false
            ]);
        }
        return response()->json([
            'massage'   => 'Show Data Category Get by id',
            'success'   => true,
            'data'      => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $show = Category::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'category'  => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $post = $show->update($request->all());
            return response()->json([
                'massage'   => 'Updated Category successfully',
                'success'   => true,
                'data'      => $post
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Updated Filed' . $e,
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
        $show = Category::findOrFail($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'request cannot respond',
                'success'   => false
            ]);
        }
        try {
            $show->delete();
            return response()->json([
                'massage'   => 'Deleted Successfully',
                'success'   => true
            ], 200);
        } catch (QueryException $d) {
            return response()->json([
                'massage'   => 'Deleted Filed' . $d,
                'success'   => false
            ]);
        }
    }
}
