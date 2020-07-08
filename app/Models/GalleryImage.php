<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;
    protected $table='gallery_images';

    protected $fillable = ['gallery_id', 'image', 'is_active'];


    public function gallery(){

        return $this->belongsTo('App\Models\Gallery');
    }
}
