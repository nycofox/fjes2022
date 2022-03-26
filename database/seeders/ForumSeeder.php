<?php

namespace Database\Seeders;

use App\Models\Forum\Channel;
use App\Models\Forum\Reply;
use App\Models\Forum\Thread;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_users = 100;
        $num_channels = 30;
        $num_threads = 500;
        $num_replies = 1000;

        User::factory($num_users)->create();

        Channel::factory($num_channels)->create();

        for ($i = 0; $i < $num_threads; $i++) {
            $date = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));

            Thread::factory()->create([
                'channel_id' => rand(1, $num_channels),
                'user_id' => rand(1, $num_users),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        for ($i = 0; $i < $num_replies; $i++) {
            $date = Carbon::today()->subDays(rand(0, 179))->addSeconds(rand(0, 86400));

            Reply::factory()->create([
                'thread_id' => rand(1, $num_threads),
                'user_id' => rand(1, $num_users),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
