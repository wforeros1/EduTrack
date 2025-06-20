<?php

namespace App\Events;

use App\Models\Grade; 
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GradeCreated
{
    use Dispatchable, SerializesModels;

   
    public Grade $grade;

    /**
     * Crea una nueva instancia del evento.
     *
     * @return void
     */
    public function __construct(Grade $grade)
    {
        
        $this->grade = $grade;
    }
}