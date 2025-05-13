<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $fillable = [
        'student_id',
        'subject_id',
        'enrollment_date',
    ];
    
}
