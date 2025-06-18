<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InstitutionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\AttendanceController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/institution', [InstitutionController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'userProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::post('/grades', [GradeController::class, 'store']);
    Route::get('/assignments', [AssignmentController::class, 'index']);
    Route::post('/attendances', [AttendanceController::class, 'store']);
});