<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use App\Events\GradeCreated;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'description' => 'required|string|max:255',
            'grade' => 'required|numeric|min:0|max:5',
        ]);

        $enrollment = Enrollment::find($validatedData['enrollment_id']);

        if (Auth::id() !== $enrollment->course->teacher_id) {
            return response()->json(['message' => 'No autorizado para calificar en este curso.'], 403);
        }

        $grade = Grade::create($validatedData);

        GradeCreated::dispatch($grade);

        return response()->json($grade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
