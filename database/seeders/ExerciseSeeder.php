<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $classroomIds = Classroom::pluck('id')->toArray();
        $userId = User::pluck('uuid')->toArray();
        $extensionFile = ["docs", "jpg", "png", "excel", "docx", "doc"];

        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'title' => $faker->sentence,
                'description' => $faker->text,
                'name_file_upload' => $faker->word . '.' . $faker->randomElement($extensionFile),
                'user_id' => $faker->randomElement($userId),
                'classroom_id' => $faker->randomElement($classroomIds),
                'created_at' => now(),
            ];
        }
        Exercise::insert($arr);
    }
}
