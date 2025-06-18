<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $institutionId = DB::table('institutions')->insertGetId([
            'name' => 'Colegio EduTrack',
            'logo_url' => null
        ]);
        $adminRoleId = DB::table('roles')->where('role_name', 'Administrador')->value('id');
        $teacherRoleId = DB::table('roles')->where('role_name', 'Docente')->value('id');
        $studentRoleId = DB::table('roles')->where('role_name', 'Estudiante')->value('id');
        $parentRoleId = DB::table('roles')->where('role_name', 'Padre')->value('id');
        DB::table('users')->insert([
            // Usuario Administrador
            [
                'first_name' => 'Admin',
                'last_name' => 'Principal',
                'email' => 'admin@edutrack.com',
                'password' => Hash::make('password'), // Contraseña para todos: "password"
                'role_id' => $adminRoleId,
                'institution_id' => $institutionId,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Usuario Docente
            [
                'first_name' => 'Ana',
                'last_name' => 'Pérez',
                'email' => 'profesora.ana@edutrack.com',
                'password' => Hash::make('password'),
                'role_id' => $teacherRoleId,
                'institution_id' => $institutionId,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Usuario Estudiante
            [
                'first_name' => 'Carlos',
                'last_name' => 'Gómez',
                'email' => 'estudiante.carlos@edutrack.com',
                'password' => Hash::make('password'),
                'role_id' => $studentRoleId,
                'institution_id' => $institutionId,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Usuario Padre
            [
                'first_name' => 'Maria',
                'last_name' => 'Rojas',
                'email' => 'padre.maria@edutrack.com',
                'password' => Hash::make('password'),
                'role_id' => $parentRoleId,
                'institution_id' => $institutionId,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
