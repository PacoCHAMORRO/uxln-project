<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    // mass assignment
    protected $fillable = [
        'name',
        'description',
        'link',
        'logo'
    ];

    // Accessor
    public function getNameAttribute($value) {
        return ucwords($value);
    }

    public function collabs()
    {
        return $this->hasMany(Collab::class);
    }
}
