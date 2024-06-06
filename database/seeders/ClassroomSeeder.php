<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Classroom;
use App\Models\Category;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $categoryIds = Category::pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'title' => $faker->randomElement(["Toán","Văn","Anh"]),
                'description' => $faker->sentence(),
                'code_classroom' => strtoupper(Str::random(10)),
                'status' => $faker->randomElement([0, 1]),
                'price' => $faker->randomFloat(2, 1, 1000),
                'category_id' => $faker->randomElement($categoryIds),
            ];
        }
        Classroom::insert($arr);
    }
}
