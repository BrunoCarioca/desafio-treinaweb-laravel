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
            "id" => $this->id,
            "nome" => $this->nome,
            "endereco" => $this->endereco,
            "contato" => $this->contato,
            "descricao" => $this->descricao,
            "imagem" => image_path($this->imagem_local),
            "usuario" => [
                "id" => $this->adminDoLocal->id,
                "nome" => $this->adminDoLocal->nome,
                "email" => $this->adminDoLocal->email,
            ],
            "links" => (new LocalHateoas())->getLinks($this->resource)
        ];
    }
}
