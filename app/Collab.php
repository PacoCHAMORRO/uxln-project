<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    protected $fillable = [
        'category',
        'title',
        'date'
    ];
}
