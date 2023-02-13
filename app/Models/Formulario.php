<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'content', 'is_caducable', 'is_comentable', 'access', 'publication_date', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
