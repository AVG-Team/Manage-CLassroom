<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\ClassroomDetail;
use App\Models\User;


class ClassroomDetailSeeder extends Seeder
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

        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'classroom_id' => $faker->randomElement($classroomIds),
                'user_id' => $faker->randomElement($userId),
                'status' => $faker->randomElement([0, 1]),
            ];
        }
        ClassroomDetail::insert($arr);
    }
}
