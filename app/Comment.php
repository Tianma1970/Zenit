<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'user_id',
        'project_id',
        'author',
        'content',
        'status'
    ];

    protected $attributes = [
        'user_id'   => Null,
        'author'     => Null,
        'content'   => Null,
        'status'    => NULL
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Project::class);
    }
}
