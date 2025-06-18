<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Models\Attendance;


class AttendanceController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'date' => 'required|date_format:Y-m-d',
            'status' => ['required', Rule::in(['present', 'absent', 'late'])],
        ]);

        $enrollment = Enrollment::findOrFail($validatedData['enrollment_id']);

        if (Auth::id() !== $enrollment->course->teacher_id) {
            return response()->json(['message' => 'No está autorizado para registrar asistencia en este curso.'], 403);
        }

        $attendance = Attendance::updateOrCreate(
            [
                'enrollment_id' => $validatedData['enrollment_id'],
                'date' => $validatedData['date'],
            ],
            [
                'status' => $validatedData['status'],
            ]
        );

        return response()->json($attendance, 200);
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
