<?php

namespace App;

use App\User;
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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
