<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Hateoas\ObjetoHateoas;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjetoResource extends JsonResource
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
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'entregue' => $this->entregue ? 'true' : 'false',
            'data_cadastro' => Carbon::parse($this->created_at)->toIso8601ZuluString(),
            'imagem' => $this->imagem_objeto,
            'links' => (new ObjetoHateoas)->getLinks($this->resource),
        ];
    }
}
