<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Project::factory()->create([
            'title'       => 'Coursework Manager',
            'year'        => 2024,
            'stack'       => ['React', 'Laravel'],
            'description' => 'Full-featured coursework manager built using React + Laravel API with JWT authentication.',
            'link'        => '#',
            'is_api'      => true,
        ]);

        Project::factory()->create([
            'title'       => 'REST API Service',
            'year'        => 2024,
            'stack'       => ['Golang', 'MySQL', 'JWT'],
            'description' => 'REST API with JWT Authentication using Golang — includes automated tests and clean architecture.',
            'link'        => '#',
            'is_api'      => true,
        ]);
    }
}
