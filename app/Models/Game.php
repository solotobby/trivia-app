<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'game_id',
        'game_category_id',
        'number_of_players',
        'number_of_questions',
        'is_premium',
        'amount',
        'status',
        'created_by',
        'duration_in_minutes',
    ];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->game_id = 'GAME-' . strtoupper(Str::random(9));
        });
    }
    public function category()
    {
        return $this->belongsTo(GameCategory::class, 'game_category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
