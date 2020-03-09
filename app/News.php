<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $attributes = [
        'title'     => NULL,
        'content'   => NULL,
        'user_id'   => NULL
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->hasMany(User::class);
    }
}
