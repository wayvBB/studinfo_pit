<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_code',
        'subject_name',
        'units',
    ];

    public function loads()
    {
        return $this->hasMany(Load::class, 'subject_code', 'subject_code');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'loads', 'subject_code', 'instructor_id')
                   ->withPivot(['semester', 'school_year']);
    }
    
}
