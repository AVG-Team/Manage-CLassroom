<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

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
            Category::create($category);
        }
    }
}
