<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retirada extends Model
{
    use HasFactory;

    protected $table = 'retirada';

    protected $fillable = [
        'item_id',
        'quantidade',
        'retirado_por',
        'data_retirada',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
