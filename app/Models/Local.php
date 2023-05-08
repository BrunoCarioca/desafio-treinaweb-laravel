<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Local extends Model
{
    use HasFactory;

    protected $table = "locais";

    protected $fillable = [
        'nome',
        'endereco',
        'contato',
        'descricao',
        'imagem_local',
        'user_id',
    ];

    /**
     * relationship between local Object
     *
     * @return HasMany
     */
    public function objetosDoLocal(): HasMany
    {
        return $this->hasMany(Objeto::class, 'local_id', 'id');
    }

    /**
     * relationship between local user
     *
     * @return HasOne
     */
    public function adminDoLocal(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}

