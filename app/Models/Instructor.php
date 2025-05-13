<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id', // Still keep as unique identifier
        'department',
        'firstname',    // Match your migration fields
        'lastname',
        'email',
        'address',
        'contact_number',
        'gender',
        'birthdate'
    ];

    public function loads()
    {
        return $this->hasMany(Load::class, 'instructor_id', 'instructor_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'loads', 'instructor_id', 'subject_code')
                   ->withPivot(['semester', 'school_year']);
    }

}