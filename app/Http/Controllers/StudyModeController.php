<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Services\StudySessionService;

class StudyModeController extends Controller
{
    protected StudySessionService $studySessionService;

    public function __construct(StudySessionService $studySessionService)
    {
        $this->studySessionService = $studySessionService;
    }

    public function getFlashCard()
    {
        $flashCard = $this->studySessionService->pickFlashcard(Auth::id());
    
        if (!$flashCard) {
            return response()->json(['message' => 'No flashcards available'], 404);
        }
    
        return response()->json([
            'message' => 'Flash Card Returned Successfully',
            'data' => $flashCard
        ]);
    }
}
