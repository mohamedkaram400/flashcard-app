<?php

namespace App\Http\Strategies;

use Illuminate\Support\Facades\DB;
use App\Http\interfaces\FlashCardSelectionStrategy;

class UnansweredFlashcardStrategy implements FlashCardSelectionStrategy
{
    public function pickFlashcard(int $userID)
    {
        $flashcard = DB::select("
            SELECT F.*
            FROM flashcards F
            LEFT JOIN study_sessions S 
                ON F.id = S.flashcard_id AND S.user_id = :user_id
            WHERE S.flashcard_id IS NULL
            AND F.id >= (SELECT FLOOR(RAND() * (SELECT MAX(id) FROM flashcards)))
            LIMIT 1
        ", ['user_id' => $userID]);

        return $flashcard ? collect($flashcard) : null;
    }

    public function canApply(int $userID) 
    {
        $studySeesions = DB::table('study_sessions')->where('user_id', $userID)->exists();
        if (!$studySeesions) {
            return $this->pickFlashcard($userID);
        }
        return null;
    }
}
