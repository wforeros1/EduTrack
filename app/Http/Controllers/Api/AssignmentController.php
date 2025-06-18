<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    public function index(Request $request)
    {
        $student = $request->user();

        $student->load('role', 'enrollments');

        if ($student->role->role_name !== 'Estudiante') {
            return response()->json(['message' => 'Acceso no autorizado para este rol.'], 403);
        }

        $enrolledCourseIds = $student->enrollments->pluck('course_id');

        $assignments = Assignment::whereIn('course_id', $enrolledCourseIds)
            ->orderBy('due_date', 'asc') 
            ->get();

        return response()->json($assignments);
    }
}
