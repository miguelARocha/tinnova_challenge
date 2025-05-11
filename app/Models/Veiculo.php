<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'veiculo', 'marca', 'ano', 'descricao', 'vendido'
    ];

    protected $casts = [
        'vendido' => 'boolean', 
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function marcasValidas()
    {
        return [
            'Ford', 'Chevrolet', 'Volkswagen',
            'Fiat', 'Honda', 'Toyota', 'Hyundai'
        ];
    }
}