<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'caption',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
