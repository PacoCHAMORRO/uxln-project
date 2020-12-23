<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'content',
        'picture'
    ];
}
