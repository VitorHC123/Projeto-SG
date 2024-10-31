<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Jogo extends Model
{
    use HasFactory;

    public $timestamps = false; 
    protected $table = 'users_jogo';

    protected $fillable = [
        'fk_user_id', 
        'fk_jogo_id', 
        'valor', 
        'nome_user', 
        'download_date', 
        'payment_id', 
        'status'
    ];

    protected $casts = [
        'valor' => 'float',
        'download_date' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'fk_jogo_id');
    }
    
}
