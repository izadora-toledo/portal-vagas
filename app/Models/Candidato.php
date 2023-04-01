<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'experiencia',
        'vaga_id',
        'user_id',
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
