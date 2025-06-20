<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class ScheduleEventSeeder extends Seeder
{
    public function run(): void
    {
        $mathCourse = Course::where('course_name', 'Matemáticas 101')->first();

        DB::table('schedule_events')->insert([
           
            [
                'title' => 'Reunión General de Padres de Familia',
                'description' => 'Reunión en el auditorio principal.',
                'start_time' => '2025-08-01 18:00:00',
                'end_time' => '2025-08-01 20:00:00',
                'course_id' => null, 
            ],
            // Evento específico de un curso
            [
                'title' => 'Examen Final de Matemáticas',
                'description' => 'El examen cubrirá todos los temas del semestre.',
                'start_time' => '2025-07-28 08:00:00',
                'end_time' => '2025-07-28 10:00:00',
                'course_id' => $mathCourse ? $mathCourse->id : null,
            ]
        ]);
    }
}