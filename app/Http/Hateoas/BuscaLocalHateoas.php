<?php

namespace App\Http\Hateoas;

use Illuminate\Database\Eloquent\Model;

class BuscaLocalHateoas extends HateoasBase implements HateoasInterface
{
    public function getLinks(?Model $recurso): array
    {
        $this->AddLink('GET', 'objetos_local', 'locais.busca.id', ['local' => $recurso->id]);

        return $this->links;
    }
}
