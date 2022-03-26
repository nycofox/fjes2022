<?php

namespace Database\Factories\Forum;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = Str::random(15);

        return [
            'slug' => $name,
            'name' => $name,
            'description' => $this->faker->paragraph,
            'nsfw' => false,
        ];
    }
}
