<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'title',
        'message',
        'image',
        'image_title',
        'family_id',
    ];
}
