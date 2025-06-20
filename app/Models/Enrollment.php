<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Enrollment extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'course_id',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
