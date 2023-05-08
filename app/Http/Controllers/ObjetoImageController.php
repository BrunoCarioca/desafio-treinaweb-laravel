<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Actions\Objetos\UpdateImageObject;

class ObjetoImageController extends Controller
{
    public function __construct(
        private UpdateImageObject $updateImageObject
    ) {}

    /**
     * Update Image for object.
     *
     * @param  Objeto  $objeto
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Objeto $objeto, Request $request): JsonResponse
    {
        $request->validate([
            'imagem_objeto' => ['required', 'image']
        ]);

        $this->updateImageObject->execute($objeto, $request->file('imagem_objeto'));

        return response()->json([
            'message' => 'Imagem definida com sucesso!'
        ]);
    }
}
