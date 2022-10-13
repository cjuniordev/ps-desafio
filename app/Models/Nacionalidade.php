<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nacionalidade extends Model
{
    use HasFactory;

    protected $table = 'nacionalidades';

    protected $fillable = [
        'nome',
        'sigla',
    ];

    /**
     * @return HasMany
     */
    public function jogadores(): HasMany
    {
        return $this->hasMany(Jogador::class, 'nacionalidade_id', 'id');
    }
}
