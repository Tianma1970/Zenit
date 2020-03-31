<?php

namespace App;

use App\Project;
use App\Course;
use App\Comment;
use App\Program;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'content',
        'title',
        'user_id',
        'course_id',
        'author',
        'comments',
        'completed'
    ];

    protected $attributes = [

        'content'   => NULL,
        'title'     => NULL,
        'user_id'   => NULL,
        'course_id' => NULL,

    ];
    public function courses()
    {
        return $this->hasMany(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function complete($completed = true)
    {
        $this->completed =$completed;
        $this->save();
    }
}
