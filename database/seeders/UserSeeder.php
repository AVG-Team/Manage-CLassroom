<?php

namespace Database\Seeders;

use App\Enums\PasswordResetTokenStatus;
use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'birthday' => $faker->date(),
                'gender' => $faker->randomElement([true, false]),
                'role' => $faker->randomElement(UserRoleEnum::getValues()),
                'password' => Hash::make('12345678'),
                'remember_token' => null,
            ];
        }
        User::insert($arr);
    }
}
