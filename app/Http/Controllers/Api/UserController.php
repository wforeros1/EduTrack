<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()->role->role_name !== 'Administrador') {
            return response()->json(['message' => 'Acceso no autorizado.'], 403);
        }

        $users = User::with('role')->get();

        return response()->json($users, 200);
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
    public function updateRole(Request $request, string $id)
    {
        if ($request->user()->role->role_name !== 'Administrador') {
            return response()->json(['message' => 'Acceso no autorizado.'], 403);
        }

        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $userToUpdate = User::findOrFail($id);
        $userToUpdate->role_id = $validatedData['role_id'];
        $userToUpdate->save();

        $userToUpdate->load('role');
        return response()->json($userToUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
