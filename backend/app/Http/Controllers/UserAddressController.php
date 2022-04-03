<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::find($user_id);
        if (is_null($user)) {
            return response()->json([
                'massage'   => 'user not registered',
                'success'   => false
            ], 404);
        }
        $address = UserAddress::where('user_id', $user_id)->get();
        return response()->json([
            'massage'   => 'Show get by user ID User Address',
            'success'   => true,
            'data'      => $address
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'address'   => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = User::find($user_id);
        if (is_null($user)) {
            return response()->json([
                'massage'   => 'user not registered',
                'success'   => false
            ], 404);
        }
        try {
            $post = UserAddress::create([
                'user_id'   => $user->id,
                'address'   => $request->address
            ]);
            return response()->json([
                'massage'   => 'Created Address Successfully',
                'success'   => true,
                'data'      => $post
            ]);
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
        $user = UserAddress::find($id);
        if (is_null($user)) {
            return response()->json([
                'massage'   =>  'User Address is not exist',
                'success'   => false
            ], 404);
        }
        try {
            return response()->json([
                'massage'   => 'Show User Address get by id address',
                'success'   => true,
                'data'      => $user
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Response Filed' . $e,
                'success'   => false
            ]);
        }
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
        $show  = UserAddress::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'address'   => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $update = $show->update([
                'user_id'   => $id,
                'address'   => $request->address
            ]);
            return response()->json([
                'massage'   => 'Updated Your Address Successfully',
                'success'   => true,
                'data'      => $update
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Updated filed' . $e,
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
        $show = UserAddress::findOrFail($id);
        try {
            $show->delete();
            return response()->json([
                'massage'   => 'Deleted Successfully',
                'success'   => true
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Deleted Filed' . $e,
                'success'   => false
            ]);
        }
    }
}
