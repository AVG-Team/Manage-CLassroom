<?php

namespace Database\Seeders;

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
        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'title' => $faker->randomElement(["Toán","Văn","Anh"]),
                'description' => $faker->sentence(),
                'code_classroom' => strtoupper(Str::random(10)),
                'status' => $faker->randomElement([0, 1]),
                'price' => $faker->randomFloat(2, 1, 1000),
                'subject_id' => $faker->randomElement($categoryIds),
            ];
        }
        Classroom::insert($arr);
    }
}
