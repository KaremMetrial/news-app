<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewSubscriber extends Model
{
    protected $table = 'new_subscribers';

    protected $fillable = ['email'];
}
