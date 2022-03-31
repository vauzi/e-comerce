<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRequest $request)
    {
        try {
            $register = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'role'      => 'user',
                'password'  => Hash::make($request->password)
            ]);
            return response()->json([
                'massage'   => 'Regiter created Successfully.',
                'success'   => true,
                'data'      => new UserResource($register)
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'Regitered Filed' . $e,
                'success'   => false
            ]);
        }
    }
}
