<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    // mass assignment
    protected $fillable = [
        'id',
        'name',
        'logo',
        'link'
    ];
}
