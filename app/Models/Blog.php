<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'description', 'is_active','keywords','meta_title'
    ];

    /**
     * The categories that belong to the deal.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\BlogCategory', 'blog_category', 'blog_id', 'category_id');
    }

}
