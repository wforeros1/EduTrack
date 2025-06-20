<?php

namespace App\Listeners;

use App\Events\GradeCreated;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewGradeNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GradeCreated $event): void
    {
        // 1. Obtenemos la calificación del evento
        $grade = $event->grade;

        // 2. Cargamos las relaciones para acceder a los datos que necesitamos
        $grade->load('enrollment.student.parents', 'enrollment.course');

        $student = $grade->enrollment->student;
        $course = $grade->enrollment->course;

        // 3. Verificamos si el estudiante tiene padres asignados
        if ($student->parents->isNotEmpty()) {
            // 4. Recorremos cada padre (un estudiante podría tener más de uno)
            foreach ($student->parents as $parent) {
                // 5. Creamos el mensaje personalizado
                $message = "Su hijo/a {$student->first_name} {$student->last_name} ha recibido una calificación de {$grade->grade} en la materia de {$course->course_name}.";

                // 6. Creamos la notificación en la base de datos para el padre
                Notification::create([
                    'user_id' => $parent->id,
                    'message' => $message,
                ]);
            }
        }
    }
}