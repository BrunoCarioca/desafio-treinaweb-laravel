<?php

namespace App\Actions\Objetos;

use App\Models\Local;
use App\Models\Objeto;

class CreateObjetoAction
{
    /**
     * Craete a new objeto for the given local.
     *
     * @param array $data
     * @param Local $local
     * @return Objeto
    */
    public function execute (array $data, Local $local): Objeto
    {
        return $local->objetosDoLocal()->create($data);

    }
}
