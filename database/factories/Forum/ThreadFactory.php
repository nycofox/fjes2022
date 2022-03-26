<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Channel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'channel_id' => function () {
                return Channel::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'slug' => Str::random(15),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
