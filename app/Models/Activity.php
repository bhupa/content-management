<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\ModelEventLogger;

class Activity extends Model
{
    use Sluggable, ModelEventLogger, SoftDeletes;

    protected $table = 'activities';

      public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'is_active'
    ];

}
