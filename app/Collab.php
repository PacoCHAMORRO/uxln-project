<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    // mass assignment
    protected $fillable = [
        'category',
        'title',
        'date'
    ];
}
