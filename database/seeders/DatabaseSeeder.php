<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            EnrollmentSeeder::class,
            AssignmentSeeder::class,
        ]);
    }
}
