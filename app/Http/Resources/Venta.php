<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Venta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=>[
                'type'=>'venta',
                'venta_id'=>$this->id,
                'attributes'=>[
                    'numero_factura'=>$this->numero_factura,
                    'cliente'=>$this->cliente,
                    'telefono'=>$this->telefono,
                    'email'=>$this->email,
                ]
            ]
                ];
            }
}
