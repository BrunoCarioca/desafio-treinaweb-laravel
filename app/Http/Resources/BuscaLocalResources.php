<?php

namespace App\Http\Resources;

use App\Http\Hateoas\BuscaLocalHateoas;
use Illuminate\Http\Resources\Json\JsonResource;

class BuscaLocalResources extends JsonResource
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
            "id" => $this->id,
            "nome" => $this->nome,
            "endereco" => $this->endereco,
            "contato" => $this->contato,
            "descricao" => $this->descricao,
            "imagem" => image_path($this->imagem_local),
            "links" => (new BuscaLocalHateoas)->getLinks($this->resource),
        ];
    }
}
