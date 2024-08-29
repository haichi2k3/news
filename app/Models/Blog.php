<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog'; 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_blog');
    }

    public function countComments()
    {
        return $this->comments()->count();
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'id_blog');
    }

    public function averageRate()
    {
        return $this->rates()->avg('rate');
    }

    public function countRates()
    {
        return $this->rates()->count();
    }

}
