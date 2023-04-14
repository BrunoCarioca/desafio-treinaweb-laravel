<?php

namespace App\Actions;

use App\Models\User;
use App\Models\Local;
use Illuminate\Support\Facades\Hash;

class AddLocalAction
{
    /**
     * Add a new local and a new user
     *
     * @param array $dados
     * @return array
     */
    public function execute(array $dados): array
    {
        $new_user = $dados['usuario'];
        $new_user['password'] = Hash::make($new_user['password']);

        $new_user = User::create($new_user);

        $new_local = $dados;
        $new_local['user_id'] = $new_user->id;

        $new_local = Local::create($new_local);

        return [
            'user' => $new_user,
            'local' => $new_local
        ];
    }
}
