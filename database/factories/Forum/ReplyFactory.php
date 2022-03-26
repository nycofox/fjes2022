<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'thread_id' => function () {
                return Thread::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'body' => $this->faker->paragraph,
        ];
    }
}
