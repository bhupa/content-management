<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use SoftDeletes,Sluggable;

    protected $table = 'articles';

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'title',
        'url',
        'slug',
        'image',
        'short_description',
        'description',
        'is_active',
        'type'
    ];


    public function getCreatedAt()
    {
        return $this->created_at->toFormattedDateString();
    }


}
