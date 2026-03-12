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
            'title'       => 'Moodify: Mood Tracker',
            'year'        => 2025,
            'stack'       => ['React', 'Java Spring-boot'],
            'description' => 'Full-featured Moodify built using React + Spring API.',
            'image_url'   => '/img/moodify.png',
            'link'        => '#',
            'is_api'      => true,
        ]);

        Project::factory()->create([
            'title'       => 'Smarthome',
            'year'        => 2025,
            'stack'       => ['React', 'MongoDB', 'node.js'],
            'description' => 'REST API with node.js — using hivemq broker to connect from hardware IoT to backend.',
            'image_url'   => '/img/smarthome.png',
            'link'        => '#',
            'is_api'      => true,
        ]);
    }
}
