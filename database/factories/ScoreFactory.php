<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => \App\Models\StudentProfile::all()->random()->id,
            'subject_id' => \App\Models\Subject::all()->random()->id,
            'tp1' => $this->faker->numberBetween(0, 10),
            'tp2' => $this->faker->numberBetween(0, 10),
            'qt' => $this->faker->numberBetween(0, 10),
            'ck' => $this->faker->numberBetween(0, 10),
            'tk' => $this->faker->numberBetween(0, 10),
        ];
    }
}
