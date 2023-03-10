<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
