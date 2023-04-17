<?php

namespace App\Http\Controllers;

use App\Actions\AddLocalAction;
use App\Actions\GetLocalAction;
use App\Http\Requests\LocalRequest;
use App\Http\Resources\LocalResources;

class LocaisController extends Controller
{
    public function __construct(
        private AddLocalAction $addLocalAction,
        private GetLocalAction $getLocalAction
    ){}

    /**
     *  Store a new local
     */
    public function store(LocalRequest $request)
    {
        $response = $this->addLocalAction->execute($request->validated());

        return new LocalResources($response);
    }

    public function index()
    {
        $response = $this->getLocalAction->execute();
        return new LocalResources($response);
    }
}
