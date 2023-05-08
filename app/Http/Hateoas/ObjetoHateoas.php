<?php

namespace App\Http\Hateoas;

use Illuminate\Database\Eloquent\Model;

class ObjetoHateoas extends HateoasBase implements HateoasInterface
{
    public function getLinks(?Model $recurso): array
    {
        $this->addLink(
            'GET',
            'self',
            'objetos.show',
            ['objeto' => $recurso->id]
        );

        $this->addLink(
            'PUT',
            'atualizar_objeto',
            'objetos.update',
            ['objeto' => $recurso->id]
        );

        $this->addLink(
            'DELETE',
            'deletar_objeto',
            'objetos.destroy',
            ['objeto' => $recurso->id]
        );

        $this->addLink(
            'POST',
            'definir_imagem_objeto',
            'objetos.img',
            ['objeto' => $recurso->id]
        );

        $this->AddLinkProvisorio(
            'PATCH',
            'definir_dono_objeto',
            '/api/objetos/1/donos',
        );

        return $this->links;
    }
}
