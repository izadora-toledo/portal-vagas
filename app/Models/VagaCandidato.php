<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaCandidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaga_id',
        'candidato_id',
        'user_id',
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
