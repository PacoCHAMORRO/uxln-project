<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collab extends Model
{
    public $timestamps = false;
    // mass assignment
    protected $fillable = [
        'category',  
        'title',    
        'date',     // fecha
        'institution_id'
    ];

    // Accessor
    public function getTitleAttribute($value) {
        return ucwords($value);
    }

    public function getCategoryAttribute($value)
    {
        return strtoupper($value);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
