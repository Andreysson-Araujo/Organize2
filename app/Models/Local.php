<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'locais';

    // Permitir preenchimento em massa
    protected $fillable = [
        'nome', // Apenas o campo 'nome' está presente na migração
    ];
}
