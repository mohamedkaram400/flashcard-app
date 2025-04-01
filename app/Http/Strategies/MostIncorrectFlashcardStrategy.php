<?php

namespace App\Http\Strategies;

use Illuminate\Support\Facades\DB;
use App\Http\interfaces\FlashCardSelectionStrategy;

class MostIncorrectFlashcardStrategy implements FlashCardSelectionStrategy
{
    public function pickFlashcard(int $userID)
    {
        $flashcard = DB::select("
            SELECT F.*
            FROM flashcards F
            JOIN study_sessions S ON F.id = S.flashcard_id
            WHERE S.user_id = :user_id
            GROUP BY F.id
            HAVING SUM(S.incorrect_answers) > SUM(S.correct_answers)
            ORDER BY SUM(S.incorrect_answers) DESC
            LIMIT 1
        ", ['user_id' => $userID]);

        return !empty($flashcard) ? collect($flashcard)->first() : null;
    }

    public function canApply(int $userID) 
    {
        $studySessions = DB::select("
            SELECT COUNT(*) AS total
            FROM study_sessions
            WHERE user_id = :user_id
            GROUP BY user_id
            HAVING SUM(incorrect_answers) > SUM(correct_answers)
        ", ['user_id' => $userID]);

        if (!empty($studySessions) && $studySessions[0]->total > 0) {
            return $this->pickFlashcard($userID);
        } 
        return null;
    }
}
