<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    // mass assignment
    protected $fillable = [
        'category',  // categoría
        'title',    // título
        'date',     // fecha
        'institution_id'
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
