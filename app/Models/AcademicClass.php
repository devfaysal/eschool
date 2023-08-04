<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')->wherePivot('session_id', 1);
    }
}
