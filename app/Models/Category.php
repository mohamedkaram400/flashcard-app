<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['subject'];

    public function flashCards() : HasMany
    {
        return $this->hasMany(FlashCard::class);
    }
}
