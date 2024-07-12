<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo dữ liệu mẫu cho bảng tasks
        foreach (range(1, 20) as $index) {
            DB::table('tasks')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'deadline' => $faker->date(),
                'user_id' => $faker->numberBetween(1, 10), // assuming 10 users exist
                'status_id' => $faker->numberBetween(1, 4), // assuming 5 statuses exist
                'note' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Tạo dữ liệu mẫu cho bảng task_follower (nếu cần)
        foreach (range(1, 50) as $index) {
            DB::table('task_follower')->insert([
                'task_id' => $faker->numberBetween(1, 20), // assuming 20 tasks exist
                'user_id' => $faker->numberBetween(1, 10), // assuming 10 users exist
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
