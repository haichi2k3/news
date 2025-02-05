<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rate'; 
    protected $fillable = [
        'id_user',
        'id_blog',
        'rate',
    ];
}
