<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class ClassroomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Toán'],
            ['name' => 'Văn'],
            ['name' => 'Anh'],
        ];

        foreach ($categories as $category) {
            Subject::create($category);
        }
    }
}
