<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Jogo extends Model
{
    use HasFactory;

    protected $table = 'users_jogo';
    protected $primaryKey = 'fk_user_id	';
    protected $primaryKey2 = 'fk_jogo_id';

    protected $fillable = [
        'fk_user_id',
        'fk_jogo_id',
    ];

    // public function jogo(): BelongsTo
    // {
    //     return $this->belongsToMany(Jogo::class, 'id', 'fk_jogo_id');
    // }

    // public function user(): BelongsTo
    // {

    //     return $this->belongsToMany(User::class, 'id', 'fk_user_id');
    // }
}
