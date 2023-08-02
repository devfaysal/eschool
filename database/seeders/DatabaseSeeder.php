<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademicClass;
use App\Models\Enrollment;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Faysal Ahamed',
            'email' => 'devfaysal@gmail.com',
            'password' => bcrypt('password'),
        ]);
        Student::factory(100)->create();
        DB::table('academic_classes')->insert([
            ['name' => 'One'],
            ['name' => 'Two'],
            ['name' => 'Three'],
            ['name' => 'Four'],
            ['name' => 'Five'],
        ]);
        Session::create(['name' => 2023, 'is_current' => true]);
        foreach(range(1,100) as $student_id){
            if($student_id < 21){
                $academic_class_id = 1;
            }
            if($student_id < 41){
                $academic_class_id = 2;
            }
            if($student_id < 61){
                $academic_class_id = 3;
            }
            if($student_id < 81){
                $academic_class_id = 4;
            }
            if($student_id > 80){
                $academic_class_id = 5;
            }
            Enrollment::create([
                'student_id' => $student_id,
                'session_id' => currentSession(),
                'academic_class_id' => $academic_class_id,
            ]);
        }
    }
}
