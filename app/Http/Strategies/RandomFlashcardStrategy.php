<?php

namespace App\Http\Strategies;

use App\Models\FlashCard;
use App\Models\StudySession;
use Illuminate\Support\Facades\DB;
use App\Http\interfaces\FlashCardSelectionStrategy;

class RandomFlashcardStrategy implements FlashCardSelectionStrategy
{
    public function pickFlashcard(int $userID)
    {
        $flashcard = DB::select("
            SELECT F.*
            FROM flashcards F
            WHERE F.difficulty = 'hard'
            AND F.id >= (SELECT FLOOR(RAND() * (SELECT MAX(id) FROM flashcards)))
            LIMIT 1
        ", ['user_id' => $userID]);

        return $flashcard ? collect($flashcard) : null;
    }

    public function canApply(int $userID) 
    {
        $hasStudySessions = DB::table('study_sessions')
            ->where('user_id', $userID)
            ->whereRaw('correct_answers > incorrect_answers')
            ->exists();

        if ($hasStudySessions) {
            return $this->pickFlashcard($userID);
        } 
        return null;
    }
}
