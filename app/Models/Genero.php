<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';

    protected $fillable = ['genero'];

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'fk_id_genero');
    }
}
