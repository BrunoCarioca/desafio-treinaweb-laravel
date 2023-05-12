<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Actions\Locais\LocaisBuscaAction;
use App\Http\Resources\BuscaLocalResourcesCollection;
use App\Http\Resources\ObjetoSimplificadoResourceCollection;

class BuscaLocalController extends Controller
{
    public function __construct(
        private LocaisBuscaAction $locaisBuscaAction
    ){}

    /**
     *  List local By name
     *
     * @param Request $request
     * @return App\Http\Resources\BuscaLocalResourcesCollection
     */
    public function listLocalByName (Request $request): BuscaLocalResourcesCollection
    {
        $request->validate([
            'nome' => 'required|string'
        ]);

        $locais = $this->locaisBuscaAction->execute($request->nome);

        return new BuscaLocalResourcesCollection($locais);
    }

    /**
     *  Show local objects
     *
     * @param Local $local
     * @return App\Http\Resources\ObjetoSimplificadoResourceCollection
     */
    public function showLocalObjects (Local $local): ObjetoSimplificadoResourceCollection
    {
        return new ObjetoSimplificadoResourceCollection($local->objetosDoLocal);
    }
}
