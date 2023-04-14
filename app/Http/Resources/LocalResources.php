<?php

namespace App\Http\Resources;

use App\Http\Hateoas\LocalHateoas;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalResources extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return[
            "id" => $this->resource['local']->id,
            "nome" => $this->resource['local']->nome,
            "endereco" => $this->resource['local']->endereco,
            "contato" => $this->resource['local']->contato,
            "descricao" => $this->resource['local']->descricao,
            "imagem" => null,
            "usuario" => [
                "id" => $this->resource['user']->id,
                "nome" => $this->resource['user']->nome,
                "email" => $this->resource['user']->email,
            ],
            "links" => (new LocalHateoas())->getLinks($this->resource['local'])
        ];
    }
}
