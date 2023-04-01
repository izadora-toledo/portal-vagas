<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'empresa',
        'localizacao',
        'tipo_contratacao',
        'salario',
        'data_criacao',
        'data_atualizacao',
        'status'
    ];
}
