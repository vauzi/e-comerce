<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $create = profile::create([
            'user_id'       => $request->user()->id,
            'nama'          => $request->nama,
            'nomor'         => $request->nomor,
            'tempatLahir'   => $request->tempatLahir,
            'tanggalLahir'   => $request->tanggalLahir,
            'jenisKelamin'  => $request->jenisKelamin,
        ]);
        return response()->json([
            'massage'   => 'created successfully.',
            'success'   => true,
            'data'      => new ProfileResource($create)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->user()->id;
        $show = profile::find($id);
        if (is_null($show)) {
            return response()->json([
                'massage'   => 'Data anda belum lengkap. Silakan lengkapi data anda',
                'success'   => false
            ]);
        }
        return response()->json([
            'massage'   => 'Your Profile',
            'success'   => true,
            'data'      => new ProfileResource($show)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $update =  profile::findOrFail($id);
        $save = $update->update([
            'user_id'       => $request->user()->id,
            'nama'          => $request->nama,
            'nomor'         => $request->nomor,
            'tempatLahir'   => $request->tempatLahir,
            'tangalLahir'   => $request->tanggalLahir,
            'jenisKelamin'  => $request->jenisKelamin,
        ]);
        return response()->json([
            'massage'   => 'updated successfully.',
            'success'   => true,
            'data'      => new ProfileResource($save)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = profile::findOrFail($id);
        $profile->delete();
        return response()->json([
            'massage'   => 'deleted successfully.',
            'success'   => true,
        ], 200);
    }
}
