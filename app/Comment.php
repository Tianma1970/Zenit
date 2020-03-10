<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'user_id',
        'author',
        'content',
        'status'
    ];

    protected $attributes = [
        'user_id'   => Null,
        'title'     => Null,
        'content'   => Null
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
