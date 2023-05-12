<?php

namespace App\Actions\Locais;

use App\Models\Local;

class LocaisBuscaAction
{
    /**
     *  Find local by name
     *
     * @param string $nome
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function execute(string $nome)
    {
        return Local::findLocalByName($nome);
    }
}
