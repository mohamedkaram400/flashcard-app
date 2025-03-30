<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'subject' => 'History',
            ],
            [
                'id' => 2,
                'subject' => 'Science',
            ],
            [
                'id' => 3,
                'subject' => 'Language',
            ],
            [
                'id' => 4,
                'subject' => 'Math',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
