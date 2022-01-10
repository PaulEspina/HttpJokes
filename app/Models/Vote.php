<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'joke_id',
        'type'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function joke()
    {
        return $this->hasOne(Joke::class);
    }
}
