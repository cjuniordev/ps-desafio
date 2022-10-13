<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jogador extends Model
{
    use HasFactory;

    protected $table = 'jogadores';

    protected $fillable = [
        'nome',
        'idade',
        'imagem',
        'nacionalidade_id',
    ];

    /**
     * @return BelongsTo
     */
    public function nacionalidade(): BelongsTo
    {
        return $this->belongsTo(Nacionalidade::class, 'nacionalidade_id', 'id');
    }
}
