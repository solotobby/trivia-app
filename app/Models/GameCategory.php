<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    protected $fillable = [
        'game_category_id',
        'name',
        'description',
        'created_by'
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->game_category_id = strtoupper(Str::random(9));
    });
}

}
