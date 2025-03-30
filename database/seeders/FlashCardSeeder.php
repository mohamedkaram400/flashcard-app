<?php

namespace Database\Seeders;

use App\Models\FlashCard;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlashCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flashcards = [
            [
                'question' => 'Who was the first president of the United States?',
                'answer' => 'George Washington',
                'category_id' => 1, // History
                'user_id' => 1,
                'review_count' => 5,
                'success_count' => 4,
                'failure_count' => 1,
                'next_review_at' => '2023-10-01 00:00:00',
                'difficulty' => 2,
                'hint' => 'He chopped down a cherry tree.',
                'last_reviewed_at' => '2023-09-01 00:00:00',
            ],
            [
                'question' => 'In what year did World War II end?',
                'answer' => '1945',
                'category_id' => 1, // History
                'user_id' => 1,
                'review_count' => 3,
                'success_count' => 2,
                'failure_count' => 1,
                'next_review_at' => '2023-09-15 00:00:00',
                'difficulty' => 3,
                'hint' => 'It was after the atomic bombs were dropped.',
                'last_reviewed_at' => '2023-08-15 00:00:00',
            ],
            [
                'question' => 'What is the chemical symbol for water?',
                'answer' => 'H2O',
                'category_id' => 2, // Science
                'user_id' => 1,
                'review_count' => 10,
                'success_count' => 9,
                'failure_count' => 1,
                'next_review_at' => '2023-11-01 00:00:00',
                'difficulty' => 1,
                'hint' => 'It\'s made of hydrogen and oxygen.',
                'last_reviewed_at' => '2023-10-01 00:00:00',
            ],
            [
                'question' => 'What planet is known as the Red Planet?',
                'answer' => 'Mars',
                'category_id' => 2, // Science
                'user_id' => 1,
                'review_count' => 2,
                'success_count' => 1,
                'failure_count' => 1,
                'next_review_at' => '2023-09-10 00:00:00',
                'difficulty' => 2,
                'hint' => 'It\'s named after the Roman god of war.',
                'last_reviewed_at' => '2023-09-05 00:00:00',
            ],
            [
                'question' => 'How do you say \'Hello\' in Spanish?',
                'answer' => 'Hola',
                'category_id' => 3, // Language
                'user_id' => 1,
                'review_count' => 15,
                'success_count' => 14,
                'failure_count' => 1,
                'next_review_at' => '2023-12-01 00:00:00',
                'difficulty' => 1,
                'hint' => 'It\'s similar to \'Hi\'.',
                'last_reviewed_at' => '2023-11-01 00:00:00',
            ],
            [
                'question' => 'What is the Spanish word for \'Thank you\'?',
                'answer' => 'Gracias',
                'category_id' => 3, // Language
                'user_id' => 1,
                'review_count' => 8,
                'success_count' => 7,
                'failure_count' => 1,
                'next_review_at' => '2023-10-15 00:00:00',
                'difficulty' => 2,
                'hint' => 'It sounds like \'grassy ass\'.',
                'last_reviewed_at' => '2023-10-01 00:00:00',
            ],
            [
                'question' => 'What is 2 + 2?',
                'answer' => '4',
                'category_id' => 4, // Math
                'user_id' => 1,
                'review_count' => 1,
                'success_count' => 1,
                'failure_count' => 0,
                'next_review_at' => '2023-09-20 00:00:00',
                'difficulty' => 1,
                'hint' => 'It\'s a basic addition.',
                'last_reviewed_at' => '2023-09-01 00:00:00',
            ],
            [
                'question' => 'What is the value of pi to two decimal places?',
                'answer' => '3.14',
                'category_id' => 4, // Math
                'user_id' => 1,
                'review_count' => 4,
                'success_count' => 3,
                'failure_count' => 1,
                'next_review_at' => '2023-09-25 00:00:00',
                'difficulty' => 3,
                'hint' => 'It\'s approximately 22/7.',
                'last_reviewed_at' => '2023-09-10 00:00:00',
            ],
            [
                'question' => 'What is the capital of France?',
                'answer' => 'Paris',
                'category_id' => 1, // History
                'user_id' => 1,
                'review_count' => 0,
                'success_count' => 0,
                'failure_count' => 0,
                'next_review_at' => null,
                'difficulty' => 1,
                'hint' => null,
                'last_reviewed_at' => null,
            ],
            [
                'question' => 'Who wrote \'Romeo and Juliet\'?',
                'answer' => 'William Shakespeare',
                'category_id' => 1, // History
                'user_id' => 1,
                'review_count' => 20,
                'success_count' => 19,
                'failure_count' => 1,
                'next_review_at' => '2024-01-01 00:00:00',
                'difficulty' => 2,
                'hint' => 'He\'s a famous English playwright.',
                'last_reviewed_at' => '2023-12-01 00:00:00',
            ],
            [
                'question' => 'What is the boiling point of water in Celsius?',
                'answer' => '100 degrees',
                'category_id' => 2, // Science
                'user_id' => 1,
                'review_count' => 6,
                'success_count' => 5,
                'failure_count' => 1,
                'next_review_at' => '2023-10-10 00:00:00',
                'difficulty' => 2,
                'hint' => 'It\'s the temperature at which water turns to steam.',
                'last_reviewed_at' => '2023-09-20 00:00:00',
            ],
            [
                'question' => 'How do you say \'Goodbye\' in Spanish?',
                'answer' => 'Adiós',
                'category_id' => 3, // Language
                'user_id' => 1,
                'review_count' => 12,
                'success_count' => 11,
                'failure_count' => 1,
                'next_review_at' => '2023-11-15 00:00:00',
                'difficulty' => 1,
                'hint' => 'It\'s similar to \'adieu\' in French.',
                'last_reviewed_at' => '2023-10-15 00:00:00',
            ],
            [
                'question' => 'What is the square root of 16?',
                'answer' => '4',
                'category_id' => 4, // Math
                'user_id' => 1,
                'review_count' => 3,
                'success_count' => 2,
                'failure_count' => 1,
                'next_review_at' => '2023-09-18 00:00:00',
                'difficulty' => 2,
                'hint' => 'It\'s a number that, when multiplied by itself, gives 16.',
                'last_reviewed_at' => '2023-09-08 00:00:00',
            ],
            [
                'question' => 'Who discovered penicillin?',
                'answer' => 'Alexander Fleming',
                'category_id' => 2, // Science
                'user_id' => 1,
                'review_count' => 7,
                'success_count' => 6,
                'failure_count' => 1,
                'next_review_at' => '2023-10-05 00:00:00',
                'difficulty' => 3,
                'hint' => 'He was a Scottish biologist.',
                'last_reviewed_at' => '2023-09-25 00:00:00',
            ],
            [
                'question' => 'What is the largest planet in our solar system?',
                'answer' => 'Jupiter',
                'category_id' => 2, // Science
                'user_id' => 1,
                'review_count' => 4,
                'success_count' => 3,
                'failure_count' => 1,
                'next_review_at' => '2023-09-30 00:00:00',
                'difficulty' => 2,
                'hint' => 'It\'s known for its Great Red Spot.',
                'last_reviewed_at' => '2023-09-15 00:00:00',
            ],
        ];

        foreach ($flashcards as $flashcard) {
            FlashCard::create($flashcard);
        }
    }
}
