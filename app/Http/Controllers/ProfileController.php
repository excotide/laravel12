<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = [
            'name'        => 'Muhammad Labiq Jazli',
            'title_main'  => 'WEB',
            'title_sub'   => 'DEVELOPER',
            'headline'    => 'Front-end developer passionate about building beautiful and functional web apps using React, Laravel & modern technologies.',
            'resume_url'  => '#project',
            'about_url'   => '#about',
            'avatar_url'  => '/img/fotolabiq.jpeg',
        ];

        $contacts = [
            'email'    => ['label' => 'email@email.com',   'href' => 'mailto:email@email.com'],
            'github'   => ['label' => 'github.com/labiq',  'href' => 'https://github.com/labiq'],
            'linkedin' => ['label' => 'linkedin.com/in/labiq', 'href' => 'https://linkedin.com/in/labiq'],
        ];

        $about = [
            'intro'           => "I'm a 4th-semester Informatics Engineering student at Politeknik Elektronika Negeri Surabaya, learning Algorithms, Data Structures, and Web Development.",
            'body'            => 'I build projects using React, Tailwind, and Laravel API — always chasing clean architecture, readable code, and fast iteration.',
            'semester'        => '4th',
            'major'           => 'Informatics Eng.',
            'campus'          => 'PENS',
            'campus_location' => 'Surabaya',
            'cta_url'         => '/about',
            'cta_label'       => 'Selengkapnya',
            'image_url'       => 'https://it.la.psdku.pens.ac.id/wp-content/uploads/slider/cache/726ec1c9803e52c9e5ef5a8034591a35/slide1-1.jpg',
        ];

        $projects = Project::query()->latest('year')->get();

        if ($projects->isEmpty()) {
            $projects = collect([
                new Project([
                    'title'       => 'Moodify: Mood Tracker',
                    'year'        => 2025,
                    'stack'       => ['React', 'Java Spring-boot'],
                    'description' => 'Full-featured Moodify built using React + Spring API.',
                    'image_url'   => '/img/moodify.png',
                    'link'        => '#',
                    'is_api'      => true,
                ]),
                new Project([
                    'title'       => 'Smarthome',
                    'year'        => 2025,
                    'stack'       => ['React', 'MongoDB', 'node.js'],
                    'description' => 'REST API with node.js — using hivemq broker to connect from hardware IoT to backend.',
                    'image_url'   => '/img/smarthome.png',
                    'link'        => '#',
                    'is_api'      => true,
                ]),
            ]);
        }

        $stats = [
            ['label' => 'Projects',     'value' => $projects->count()],
            ['label' => 'APIs shipped', 'value' => $projects->where('is_api', true)->count()],
            ['label' => 'Curiosity',    'value' => '∞'],
        ];

        $skills = $projects
            ->flatMap(fn ($project) => $project->stack ?? [])
            ->unique()
            ->values();

        $ticker = $skills
            ->merge(['PostgreSQL', 'REST API', 'JWT Auth'])
            ->unique()
            ->values();

        return view('profile', compact('profile', 'stats', 'projects', 'skills', 'ticker', 'contacts', 'about'));
    }

    public function about()
    {
        return view('about');
    }
}