<?php

namespace Database\Seeders;

use App\Models\Execrise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            [
                'title' => 'Bài tập 1',
                'description' => 'Bài tập 1',
                'name_file_upload' => 'BaiTap1.pdf',
                'user_id' => '9c3569dd-c15f-4b18-9455-8ffc7e92cfac',
                'classroom_id' => 1,
            ],
            [
                'title' => 'Bài tập 2',
                'description' => 'Bài tập 2',
                'name_file_upload' => 'BaiTap2.pdf',
                'user_id' => '9c3569dd-c15f-4b18-9455-8ffc7e92cfac',
                'classroom_id' => 1,
            ],
            [
                'title' => 'Bài tập 3',
                'description' => 'Bài tập 3',
                'name_file_upload' => 'BaiTap3.pdf',
                'user_id' => '9c3569dd-c15f-4b18-9455-8ffc7e92cfac',
                'classroom_id' => 1,
            ],
        ];

        foreach ($exercises as $exercise) {
            Execrise::create($exercise);
        }
    }
}
