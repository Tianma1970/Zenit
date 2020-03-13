<?php

namespace App;

use App\Course;
use App\Program;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'course_id'
    ];

    protected $attributes = [

        'content'   => NULL,
        'user_id'   => NULL,
        'course_id' => NULL
    ];
    public function courses()
    {
        return $this->hasMany(Project::class);
    }
}
