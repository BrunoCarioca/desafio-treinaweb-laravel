<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UpdateImageLocalAction
{
    public function execute(UploadedFile $photo_image)
    {
        $local = Auth::user()->getLocal();
        $local->imagem_local = $photo_image->store('local', 'public');
        $local->save();
    }
}
