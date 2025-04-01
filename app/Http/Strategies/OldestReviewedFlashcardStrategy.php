<?php

namespace App\Http\Strategies;

use App\Models\FlashCard;
use App\Models\StudySession;
use Illuminate\Support\Facades\DB;
use App\Http\interfaces\FlashCardSelectionStrategy;

class OldestReviewedFlashcardStrategy implements FlashCardSelectionStrategy
{
    public function pickFlashcard(int $userID)
    {
        $flashCard = DB::select("
            SELECT F.*
            FROM flashcards F
            INNER JOIN study_sessions S
                ON F.id = S.flashcard_id
            WHERE S.user_id = :user_id
            ORDER BY S.updated_at ASC
            LIMIT 1
        ", ["user_id" => $userID]);
        
        return !empty($flashCard) ? collect($flashCard)->first() : null;
    }

    public function canApply(int $userID) 
    {
        $studySeesions = DB::table('study_sessions')->where('user_id', $userID)->exists();
        if ($studySeesions) {
            return $this->pickFlashcard($userID);
        } 
        return null;
    }
}