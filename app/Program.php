<?php

namespace App;

use App\User;
use App\Course;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'year',
        'user_id'
    ];

    protected $attributes = [
        'name'      => NULL,
        'year'      => NULL,
        'user_id'   => NULL
    ];

    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }

    public function projects()
    {
        return $this->hasManyThrough(Project::class, Course::class, 'program_id', 'course_id', 'id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

}
