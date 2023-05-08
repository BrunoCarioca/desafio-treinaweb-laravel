<?php

namespace App\Actions\Objetos;

use App\Models\Objeto;
use Illuminate\Http\UploadedFile;

class UpdateImageObject
{
    /**
     * Update the image of the given objeto.
     *
     * @param Objeto $objeto
     * @param UploadedFile $file
     * @return void
     */
    public function execute(Objeto $objeto, UploadedFile $file):void
    {
        $path = $file->store('imagens');

        $objeto->update([
            'imagem_objeto' => $path
        ]);
    }
}
