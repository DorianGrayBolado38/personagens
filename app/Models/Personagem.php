<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPersonagem';
    protected $table = 'personagem';
    protected $fillable = [
        'nomePersonagem',
        'dataPersonagem',
        'obraPersonagem',
        'imgPersonagem',
    ];
}
