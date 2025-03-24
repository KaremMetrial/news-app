<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'path'
    ];

    //Relations
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
