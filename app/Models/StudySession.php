<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudySession extends Model
{
    protected $fillable = ['user_id', 'flashcard_id', 'attempts', 'correct_answers', 'incorrect_answers'];
}
