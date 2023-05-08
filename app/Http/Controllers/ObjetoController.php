<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ObjetoRequest;
use App\Http\Resources\ObjetoResource;
use App\Actions\Objetos\CreateObjetoAction;
use App\Actions\Objetos\UpdateObjetoAction;
use App\Http\Resources\ObjetoResourceCollection;

class ObjetoController extends Controller
{
    public function __construct(
        private CreateObjetoAction $createObjetoAction,
        private UpdateObjetoAction $updateObjetoAction
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return ObjetoResourceCollection
     */
    public function index(): ObjetoResourceCollection
    {
        return new ObjetoResourceCollection(
            Auth::user()->getLocal()->objetosDoLocal
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ObjetoRequest  $request
     * @return ObjetoResource
     */
    public function store(ObjetoRequest $request): ObjetoResource
    {
        $objeto = $this->createObjetoAction
            ->execute($request->all(), Auth::user()->getLocal());

        return new ObjetoResource($objeto);
    }

    /**
     * Display the specified resource.
     *
     * @param  Objeto $bjeto
     * @return ObjetoResource
     */
    public function show(Objeto $objeto): ObjetoResource
    {
        return new ObjetoResource($objeto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Objeto $objeto
     * @param ObjetoRequest $request
     *
     * @return ObjetoResource
    */
    public function update(Objeto $objeto, ObjetoRequest $request): ObjetoResource
    {
        $objeto = $this->updateObjetoAction
            ->execute($request->all(), $objeto);

        return new ObjetoResource($objeto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Objeto $objeto
     * @return JsonResponse
     */
    public function destroy(Objeto $objeto): JsonResponse
    {
        $objeto->delete();
        return response()->json('OK', 204);
    }
}
