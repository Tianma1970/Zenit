<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'program_id',
        'title',
        'content',
        'user_id',
        'author'
    ];

    protected $attributes = [
        'program_id' => NULL,
        'title'     => NULL,
        'content'   => NULL,
        'user_id'   => NULL,
        'author'    => NULL
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
