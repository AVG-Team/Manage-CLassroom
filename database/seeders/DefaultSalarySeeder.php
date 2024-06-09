<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\DefaultSalary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        $list_salary_default = [5, 6, 7, 8, 9, 10, 15, 20, 25];
        $multiplier = 1 * 1000 * 1000;
        $list_salary_default = array_map(function ($value) use ($multiplier) {
            return $value * $multiplier;
        }, $list_salary_default);

        foreach ($list_salary_default as $salary) {
            $arr[] = [
                'salary' => $salary,
            ];
        }

        DefaultSalary::insert($arr);
    }
}
