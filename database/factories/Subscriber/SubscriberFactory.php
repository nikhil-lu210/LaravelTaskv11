<?php

namespace Database\Factories\Subscriber;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\Subscriber\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'website_id' => rand(1,5),
            'name' => fake()->name(),
            'email' => fake()->email(),
        ];
    }
}
