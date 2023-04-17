<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\UpdateImageLocalAction;

class UpdateImageLocalController extends Controller
{
    public function __construct(
        private UpdateImageLocalAction $updateImageLocalAction
    ){}

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'imagem_local' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->updateImageLocalAction->execute($request->imagem_local);

        return response()->json([
            'message' => 'Imagem definida com sucesso!'
        ], 200);
    }
}
