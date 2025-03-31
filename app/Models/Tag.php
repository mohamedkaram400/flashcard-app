<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function flashcards() : BelongsToMany
    {
        return $this->belongsToMany(FlashCard::class, 'flashcard_tag', 'tag_id', 'flashcard_id');
    }
}
