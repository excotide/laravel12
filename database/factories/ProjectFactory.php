<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $stacks = [
            ['React', 'Laravel'],
            ['Golang', 'MySQL', 'JWT'],
            ['TypeScript', 'Tailwind CSS', 'REST API'],
        ];

        $stack = $this->faker->randomElement($stacks);

        return [
            'title'       => $this->faker->sentence(3),
            'year'        => (int) $this->faker->year,
            'stack'       => $stack,
            'description' => $this->faker->sentence(12),
            'link'        => '#',
            'is_api'      => $this->faker->boolean(50),
        ];
    }
}
