<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class GetLocalAction
{
    /**
     * Get a local
     *
     * @param int $id
     * @return array
     */
    public function execute(): array
    {
        $user = Auth::user();
        $local = $user->getLocal();

        return [
            'user' => $user,
            'local' => $local
        ];
    }
}
