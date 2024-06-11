<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Classroom;
use App\Models\Subject;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $categoryIds = Subject::pluck('id')->toArray();
        $users = User::query()->where('role', UserRoleEnum::TEACHER)->pluck('uuid')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'title' => $faker->randomElement(["Toán","Văn","Anh"]),
                'description' => $faker->sentence(),
                'code_classroom' => strtoupper(Str::random(10)),
                'status' => $faker->randomElement([0, 1]),
                'price' => $faker->randomFloat(2, 1, 1000),
                'subject_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'grade' => $faker->randomElement([6, 7, 8, 9, 10,11,12]),
                'capacity' => 15,
                'teacher_id' => $faker->randomElement($users),
            ];
        }
        Classroom::insert($arr);
    }
}
