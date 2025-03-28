<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['subject'];

    public function flashCards()
    {
        return $this->hasMany(FlashCard::class);
    }
}
