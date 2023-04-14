<?php

namespace App\Http\Hateoas;

use Illuminate\Database\Eloquent\Model;

class LocalHateoas extends HateoasBase implements HateoasInterface
{
    public function getLinks(?Model $recurso): array
    {
        // $this->addLink('GET', 'self', 'local.show', ['local' => $recurso->id]);
        // $this->addLink('PUT', 'update', 'local.update', ['local' => $recurso->id]);
        // $this->addLink('DELETE', 'delete', 'local.destroy', ['local' => $recurso->id]);
        // $this->addLink('GET', 'list', 'local.index');
        // $this->addLink('POST', 'create', 'local.store');

        $this->addLink('GET', 'self', '/api/locais');
        $this->addLink('PUT', 'atualizar_local', '/api/locais');
        $this->addLink('DELETE', 'deletar_local', '/api/locais');
        $this->addLink('POST', 'definir_imagem_local', '/api/locais/imagem');
        $this->addLink('GET', 'listar_objetos_local', '/api/objetos');
        $this->addLink('POST', 'adicionar_objeto_local', '/api/objetos');

        return $this->links;
    }
}
{

}
