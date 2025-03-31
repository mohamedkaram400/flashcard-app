<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FlashCard extends Model
{
    protected $table = 'flashcards';

    protected $fillable = [
        'question', 
        'answer', 
        'category_id',
        'user_id', 
        'review_count', 
        'success_count', 
        'failure_count',
        'next_review_at',
        'difficulty',
        'hint',
        'last_reviewed_at',
    ];

    public function category() : HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'flashcard_tag', 'flashcard_id', 'tag_id');
    }
}
