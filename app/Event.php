<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'date',
        'description',
        'picture',
    ];

    // Accessor
    public function getTitleAttribute($value) {
        return ucwords($value);
    }
}
