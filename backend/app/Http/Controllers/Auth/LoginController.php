<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'massage'   => 'Unauthorized',
                    'success'    => false
                ], Response::HTTP_UNAUTHORIZED);
            }
            $token = $user->createToken($user->role)->plainTextToken;
            return response()->json([
                'massage'   => 'Login succsess',
                'success'    => true,
                'user'      => $user,
                'token'     => $token
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'massage'   => 'login Filed' . $e,
                'success'    => false
            ]);
        }
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $token = $user->tokens()->where('tokenable_id', $user->id)->delete();
        return response()->json([
            'massage'           => 'Logout Successfully',
            'success'            => true,
            'tokenOnDeleted'    => $token,
        ], Response::HTTP_OK);
    }
}
