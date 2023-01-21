<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'score',
        'publisher',
        'image_path',
        'content',
        'is_favorite',
    ];
}
