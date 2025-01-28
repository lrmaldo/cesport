<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'telefono',
        'correo_electronico',
        'categoria',
        'genero',
        'numero_corredor',
        'talla_playera',
        'captura_transferencia',
    ];
}
