<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "cep"=> Str::replace("-", "", $this->resource['cep']),
            "label"=> $this->resource['logradouro'].', '.$this->resource['localidade'],
            "logradouro"=> $this->resource['logradouro'],
            "complemento"=> $this->resource['complemento'],
            "bairro"=> $this->resource['bairro'],
            "localidade"=> $this->resource['localidade'],
            "uf"=> $this->resource['uf'],
            "ibge"=> $this->resource['ibge'],
            "gia"=> $this->resource['gia'],
            "ddd"=> $this->resource['ddd'],
            "siafi"=> $this->resource['siafi'],
        ];
    }
}
