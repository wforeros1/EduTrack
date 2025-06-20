<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function generateGradeReport(string $id)
    {
       
        $enrollment = Enrollment::with(['student', 'course', 'grades'])->findOrFail($id);

        
        if (Auth::id() !== $enrollment->course->teacher_id) {
            return response()->json(['message' => 'No autorizado para generar este reporte.'], 403);
        }

        
        $pdf = Pdf::loadView('reports.grade_report', compact('enrollment'));

        
        return $pdf->stream('boletin-calificaciones.pdf');
    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
