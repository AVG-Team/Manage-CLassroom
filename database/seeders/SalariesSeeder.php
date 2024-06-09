<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\DefaultSalary;
use App\Models\Exercise;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $defaultSalaryids = DefaultSalary::pluck('id')->toArray();
        $userId = User::pluck('uuid')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'bonus' => $faker->randomFloat(2, 0, 100) * 1000 * 1000,
                'status' => $faker->randomElement([0, 1, 2]),
                'payday' => $faker->dateTimeBetween('-2 years', 'now'),
                'note' => $faker->text,
                'user_id' => $faker->randomElement($userId),
                'default_salary_id' => $faker->randomElement($defaultSalaryids),
                'created_at' => now(),
            ];
        }
        Salary::insert($arr);
    }
}
