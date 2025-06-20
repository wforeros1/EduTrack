<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load('role');

        // 1. Autorización: ¿Es un padre?
        if ($user->role->role_name !== 'Padre') {
            return response()->json(['message' => 'Acceso no autorizado para este rol.'], 403);
        }

        // 2. Acción: Obtenemos las notificaciones de este usuario, ordenadas por la más reciente
        $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();

        // 3. Respuesta: Devolvemos las notificaciones
        return response()->json($notifications);
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
