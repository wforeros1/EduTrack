<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\ScheduleEvent;


class ScheduleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $student = $request->user()->load('enrollments');
        $courseIds = $student->enrollments->pluck('course_id');
        $assignments = Assignment::whereIn('course_id', $courseIds)->get();
        $events = ScheduleEvent::whereIn('course_id', $courseIds)
            ->orWhereNull('course_id')
            ->get();

        $agenda = collect([]);

        foreach ($assignments as $assignment) {
            $agenda->push([
                'title' => 'Entrega: ' . $assignment->title,
                'date' => $assignment->due_date,
                'type' => 'assignment'
            ]);
        }

         foreach ($events as $event) {
            $agenda->push([
                'title' => $event->title,
                'date' => $event->start_time,
                'type' => 'event'
            ]);
        }

        return response()->json($agenda->sortBy('date')->values()->all());
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
