<?php

namespace App\Actions\Objetos;

use App\Models\Objeto;

class UpdateObjetoAction
{
    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Objeto $objeto
     * @return Objeto
     */
    public function execute(array $data, Objeto $objeto): Objeto
    {
        $objeto->update($data);
        return $objeto;
    }
}
