<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'game_id',
        'text'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
