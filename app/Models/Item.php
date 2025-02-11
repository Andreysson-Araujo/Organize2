<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome_item', 
        'patrimonio', 
        'quantidade', 
        'local_id', 
        'status', 
        'categoria_id', 
    ];

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id'); // A chave estrangeira é categoria_id
    }
}
