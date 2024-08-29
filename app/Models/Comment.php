<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'id_blog',
        'id_user',
        'name',
        'avatar_path',
        'level',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'level');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'level');
    }

    

}
