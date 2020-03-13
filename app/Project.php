<?php

namespace App;

use App\Course;
use App\Program;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
    public function program()
    {
        return $this->belongsTo(Project::class);
    }
}
