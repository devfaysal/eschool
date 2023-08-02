<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function enrollment()
    {
        return Enrollment::query()
            ->where('student_id', $this)
            ->where('session_id', currentSession())
            ->first();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
