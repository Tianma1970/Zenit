<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'title',
        'content',
        'points',
        'program_id'
    ];

    protected $attributes = [
        'title'         => NULL,
        'content'       => NULL,
        'points'        => NULL,
        'program_id'    => NULL
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
