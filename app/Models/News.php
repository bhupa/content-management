<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
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

    protected $fillable = ['display_order','short_description', 'title', 'slug', 'image', 'description', 'published_date', 'is_active', 'created_by', 'updated_by', 'status_by', 'deleted_by','type','keywords','meta_title'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'published_date'
    ];
}
