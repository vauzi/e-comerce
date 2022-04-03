<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'user_id'       => $this->user_id,
            'nama'          => $this->name,
            'nomor'         => $this->nomor,
            'tempatLahir'   => $this->tempatLahir,
            'tanggalLahir'   => $this->tanggalLahir,
            'jenisKelamin'  => $this->jenisKelamin,
        ];
    }
}
