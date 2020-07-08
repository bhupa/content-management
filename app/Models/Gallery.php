<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
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
            
    protected $table='galleries';
    
    protected $fillable = ['display_order', 'title', 'slug', 'image', 'description', 'is_active', 'created_by', 'updated_by', 'status_by', 'deleted_by'];

    public function images(){
        return $this->hasMany('App\Models\GalleryImage', 'gallery_id');
    }
}
