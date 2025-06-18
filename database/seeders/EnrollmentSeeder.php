<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $student = User::where('email', 'estudiante.carlos@edutrack.com')->first();
        $course = Course::where('course_name', 'Matemáticas 101')->first();

       
        if ($student && $course) {
            DB::table('enrollments')->insert([
                'student_id' => $student->id,
                'course_id' => $course->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}