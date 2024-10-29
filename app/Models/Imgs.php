<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgs extends Model
{
    use HasFactory;

    protected $table = 'imgs';

    protected $casts = [
        'id' => 'integer',
    ];

    protected $fillable = [
        'img_nome',
        'img',
    ];

    public function jogos()
    {
        return $this->hasMany(Jogo::class, 'fk_id_imgs');
    }
}
