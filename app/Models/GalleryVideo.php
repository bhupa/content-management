<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryVideo extends Model
{
    use SoftDeletes;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['gallery_id','display_order', 'title', 'slug', 'image', 'link', 'is_active', 'created_by', 'updated_by', 'status_by', 'deleted_by'];

}
