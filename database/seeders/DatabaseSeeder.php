<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Question::factory(50)->hasAnswers(3)->hasAnswers(1, ['is_correct' => true])->create();
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$kSECnmXftV9Wv58GV0li0uavngQVHVlBuVG4Uesod8jRl/hlr/5k6',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'username' => 'user',
            'email' => 'user@user.com',
        ]);
        Question::factory()->create([

        ]);
        // User::factory(20)->create();
    }
}
