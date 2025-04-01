<?php
namespace App\Http\Services;

use App\Http\Strategies\MostIncorrectFlashcardStrategy;
use App\Http\Strategies\OldestReviewedFlashcardStrategy;
use App\Http\Strategies\RandomFlashcardStrategy;
use App\Http\Strategies\UnansweredFlashcardStrategy;
use App\Http\Traits\ApiResponseTrait;

class StudySessionService
{
    use ApiResponseTrait;

    private $strategies = [];

    public function __construct()
    {
        $this->strategies = [
            new UnansweredFlashcardStrategy(),
            new MostIncorrectFlashcardStrategy(),
            new OldestReviewedFlashcardStrategy(),
            new RandomFlashcardStrategy(),
        ];
    }

    public function pickFlashcard(int $userID)
    {
        foreach ($this->strategies as $strategy) {
            $flashCard = $strategy->canApply($userID);
            if (!is_null($flashCard)) {
                return $flashCard;
            }
        }
        return null;
    }
}