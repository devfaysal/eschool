<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

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
        return $this->belongsToMany(AcademicClass::class, 'enrollments')->wherePivot('session_id', 1);
    }

    public function enroll()
    {
        dd($this);
    }
}
