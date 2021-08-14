<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'New Project',
            'slogan' => 'New Slogan',
            'description' => 'New Project Description',
        ];
    }
}
