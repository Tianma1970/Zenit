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
        'program_id',
        'goal',
        'knowledge',
        'skills',
        'competence',
        'forms',
        'literature'
    ];

    protected $attributes = [
        'title'         => NULL,
        'content'       => NULL,
        'points'        => NULL,
        'program_id'    => NULL,
        'goal'          => NULL,
        'knowledge'     => NULL,
        'skills'        => NULL,
        'competence'    => NULL,
        'forms'         => NULL,
        'literature'    => NULL
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Program::class);
    }
}
