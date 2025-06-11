<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'website' => $this->faker->url,
            'image' => $this->faker->imageUrl(640, 480, 'activity'),
        ];
    }
}
