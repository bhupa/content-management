<?php

namespace App\Models;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use Sluggable, ModelEventLogger;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_order', 'name', 'meta_title', 'meta_description', 'slug', 'image', 'description', 'is_active', 'created_by', 'updated_by', 'status_by', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
