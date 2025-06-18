<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Usamos el modelo para que sea más fácil

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos a la docente Ana Pérez por su email
        $teacher = User::where('email', 'profesora.ana@edutrack.com')->first();

        // Solo si encontramos a la docente, creamos los cursos
        if ($teacher) {
            DB::table('courses')->insert([
                [
                    'course_name' => 'Matemáticas 101',
                    'teacher_id' => $teacher->id,
                    'grade' => '10mo Grado',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'course_name' => 'Historia del Siglo XX',
                    'teacher_id' => $teacher->id,
                    'grade' => '11vo Grado',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}