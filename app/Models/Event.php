<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected  $table ='event';

    protected $fillable =[
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'is_active'

    ];
}
