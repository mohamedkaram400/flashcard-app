<?php
namespace App\Http\interfaces;

interface FlashCardSelectionStrategy
{
    public function pickFlashcard(int $userID);
    public function canApply(int $userID);
}