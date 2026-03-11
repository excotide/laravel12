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
        ];

        $contacts = [
            'email'    => ['label' => 'email@email.com',   'href' => 'mailto:email@email.com'],
            'github'   => ['label' => 'github.com/labiq',  'href' => 'https://github.com/labiq'],
            'linkedin' => ['label' => 'linkedin.com/in/labiq', 'href' => 'https://linkedin.com/in/labiq'],
        ];

        $about = [
            'intro'           => "I'm a third-semester Informatics Engineering student at Politeknik Elektronika Negeri Surabaya, learning Algorithms, Data Structures, and Web Development.",
            'body'            => 'I build projects using React, Tailwind, and Laravel API — always chasing clean architecture, readable code, and fast iteration.',
            'semester'        => '3rd',
            'major'           => 'Informatics Eng.',
            'campus'          => 'PENS',
            'campus_location' => 'Surabaya',
            'cta_url'         => '/about',
            'cta_label'       => 'Selengkapnya',
        ];

        $projects = Project::query()->latest('year')->get();

        if ($projects->isEmpty()) {
            $projects = collect([
                new Project([
                    'title'       => 'Coursework Manager',
                    'year'        => 2024,
                    'stack'       => ['React', 'Laravel'],
                    'description' => 'Full-featured coursework manager built using React + Laravel API with JWT authentication.',
                    'link'        => '#',
                    'is_api'      => true,
                ]),
                new Project([
                    'title'       => 'REST API Service',
                    'year'        => 2024,
                    'stack'       => ['Golang', 'MySQL', 'JWT'],
                    'description' => 'REST API with JWT Authentication using Golang — includes automated tests and clean architecture.',
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