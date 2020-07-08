<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
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

    protected $fillable = ['display_order', 'position', 'title', 'slug', 'image', 'link', 'timer', 'start_date', 'end_date', 'is_active', 'created_by', 'updated_by', 'status_by', 'deleted_by'];

}
