<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', "user_id"
    ];

    public function user() {

        return $this->belongsTo(User::class, "user_id");

    }

    public function projectUrls() {

        return $this->hasMany(ProjectUrl::class);

    }

}
