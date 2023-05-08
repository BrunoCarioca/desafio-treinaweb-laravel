<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Objeto extends Model
{
    use HasFactory;

    protected $table = 'objetos';

    protected $fillable = [
        'nome',
        'descricao',
        'entregue',
        'imagem_objeto',
        'local_id',
        'dono_nome',
        'dono_cpf',
    ];

    /**
     * relationship between objeto local
     *
     * @return HasOne
     */
    public function objetoLocal(): HasOne
    {
        return $this->hasOne(Local::class, 'id', 'local_id');
    }
}
