<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    // mass assignment
    protected $fillable = [
        'name',
        'logo',
        'link'
    ];

    public function collabs()
    {
        return $this->hasMany(Collab::class);
    }
}
