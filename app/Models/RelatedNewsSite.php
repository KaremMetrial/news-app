<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelatedNewsSite extends Model
{
    use HasFactory;

    protected $table = "related_sites";

    protected $fillable = ['name', 'url'];
}
