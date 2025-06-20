<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    use HasFactory;

     protected $fillable = [
        'course_id',
        'title',
        'description',
        'start_time',
        'end_time'
    ];
}
