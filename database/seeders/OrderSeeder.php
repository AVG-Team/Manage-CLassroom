<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create('vi_VN');
        $classroomIds = Classroom::pluck('id')->toArray();
        $userId = User::pluck('uuid')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $classroomId = $faker->randomElement($classroomIds);
            $classroom = Classroom::query()->where('id', $classroomId)->first();
            $total = $classroom->price == null ? 0 : $classroom->price;
            $arr[] = [
                'user_id' => $faker->randomElement($userId),
                'classroom_id' => $faker->randomElement($classroomIds),
                'status' => $faker->randomElement([0, 1]),
                'created_at' => now(),
                'updated_at' => now(),
                'total' => $total,
                'code_order' => 'AVG' . Str::random(5) . $faker->unique()->randomNumber(8),
            ];
        }
        Order::insert($arr);
    }
}
