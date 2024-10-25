<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $table = 'jogo';

    protected $fillable = [
        'nome', 
        'descricao', 
        'preco', 
        'fk_id_imgs',          
        'jogo_img',    
        'fk_id_genero',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'fk_id_genero');
    }

    public function imagemPerfil()
    {
        return $this->belongsTo(Imgs::class, 'fk_id_imgs');
    }

    public function imagemFundo()
    {
        return $this->belongsTo(Imgs::class, 'jogo_img'); 
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_jogo', 'fk_jogo_id', 'fk_user_id')
                    ->withPivot('download_date');
    }
}
