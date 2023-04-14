<?php

namespace App\Http\Controllers;

use App\Actions\AddLocalAction;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LocalRequest;
use App\Http\Resources\LocalResources;

class LocaisController extends Controller
{
    public function __construct(private AddLocalAction $addLocalAction){}

    /**
     *  Cadastrar um novo local
     */
    public function store(LocalRequest $request)
    {
        $response = $this->addLocalAction->execute($request->validated());

        return new LocalResources($response);
    }
}
