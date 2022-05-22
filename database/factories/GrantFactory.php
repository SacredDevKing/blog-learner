<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grant>
 */
class GrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /*
             * Заполняем таблицу grants данными
             */
            'title' => $this->faker->word,
            'short_content' => $this->faker->sentence,
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'start_grant' => $this->faker->dateTime,
            'end_grant' => $this->faker->dateTime,
        ];
    }
}
