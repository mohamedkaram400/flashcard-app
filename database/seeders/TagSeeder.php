<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {
        // Seed the tags table
        $tags = [
            ['id' => 1, 'name' => 'Presidents'],
            ['id' => 2, 'name' => 'World War II'],
            ['id' => 3, 'name' => 'Chemistry'],
            ['id' => 4, 'name' => 'Astronomy'],
            ['id' => 5, 'name' => 'Spanish'],
            ['id' => 6, 'name' => 'Basic Math'],
            ['id' => 7, 'name' => 'Geometry'],
            ['id' => 8, 'name' => 'Literature'],
            ['id' => 9, 'name' => 'Biology'],
            ['id' => 10, 'name' => 'Geography'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        // Seed the flashcard_tag pivot table
        $flashcardTags = [
            ['flashcard_id' => 1, 'tag_id' => 1],
            ['flashcard_id' => 2, 'tag_id' => 2],
            ['flashcard_id' => 3, 'tag_id' => 3],
            ['flashcard_id' => 4, 'tag_id' => 4],
            ['flashcard_id' => 5, 'tag_id' => 5],
            ['flashcard_id' => 6, 'tag_id' => 5],
            ['flashcard_id' => 7, 'tag_id' => 6],
            ['flashcard_id' => 8, 'tag_id' => 7],
            ['flashcard_id' => 9, 'tag_id' => 10],
            ['flashcard_id' => 10, 'tag_id' => 8],
            ['flashcard_id' => 11, 'tag_id' => 3],
            ['flashcard_id' => 12, 'tag_id' => 5],
            ['flashcard_id' => 13, 'tag_id' => 6],
            ['flashcard_id' => 14, 'tag_id' => 9],
            ['flashcard_id' => 15, 'tag_id' => 4],
        ];

        foreach ($flashcardTags as $flashcardTag) {
            DB::table('flashcard_tag')->insert($flashcardTag);
        }
    }
}