<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LocalRequest;

class LocaisController extends Controller
{
    /**
     *  Cadastrar um novo local
     */
    public function store(LocalRequest $request) //:JsonResponse
    {
        dd("controller");
    }
}
