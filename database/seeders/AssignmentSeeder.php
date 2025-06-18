<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $mathCourse = Course::where('course_name', 'Matemáticas 101')->first();

        
        if ($mathCourse) {
            DB::table('assignments')->insert([
                [
                    'course_id' => $mathCourse->id,
                    'title' => 'Resolver Ecuaciones Lineales',
                    'description' => 'Resolver los problemas de la página 42 del libro de texto.',
                    'due_date' => '2025-07-10 23:59:59', // Fecha de entrega
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'course_id' => $mathCourse->id,
                    'title' => 'Ensayo de Geometría',
                    'description' => 'Escribir un ensayo de 500 palabras sobre la importancia de Pi.',
                    'due_date' => '2025-07-25 23:59:59',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}