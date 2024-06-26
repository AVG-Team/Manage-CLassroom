<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Exercise;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $userIds = User::pluck('uuid')->toArray();
        $extensionFile = ["docs", "jpg", "png", "excel", "docx", "doc"];

        for ($i = 1; $i <= 10; $i++) {
            $classroomId = $faker->randomElement($classroomIds);
            $classroom = Classroom::query()->where('id', $classroomId)->first();
            $userId = User::query()->where('uuid', $faker->randomElement($userIds))->first();

            $arr[] = [
                'title' => $faker->sentence,
                'description' => $faker->text,
                'name_file_upload' => $faker->word . '.' . $faker->randomElement($extensionFile),
                'user_id' => $userId->uuid,
                'classroom_id' => $classroom->id,
                'created_at' => now(),
            ];
        }
        Exercise::insert($arr);
    }
}
