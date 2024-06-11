<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\UserSubscribed;
use App\Models\User;
use Illuminate\Support\Str;


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
        $userIds = User::pluck('uuid')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $classroomId = $faker->randomElement($classroomIds);
            $classroom = Classroom::query()->where('id', $classroomId)->first();
            $userId = User::query()->where('uuid', $faker->randomElement($userIds))->first();

            $arr[] = [
                'classroom_id' => $classroom->id,
                'user_id' => $userId->uuid,
                'status' => $faker->randomElement([0, 1]),
            ];

            $total = $classroom->price == null ? 0 : $classroom->price;

            $arr1[] = [
                'user_id' => $userId->uuid,
                'classroom_id' => $classroom->id,
                'status' => $faker->randomElement([0, 1]),
                'created_at' => now(),
                'updated_at' => now(),
                'total' => $total,
                'code_order' => 'AVG' . Str::random(5) . $faker->unique()->randomNumber(8),
            ];
        }
        UserSubscribed::insert($arr);
        Order::insert($arr1);
    }
}
