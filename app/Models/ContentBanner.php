<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBanner extends Model
{
    protected $table='content-banner';

    protected $fillable =[
        'title',
        'image',
        'is_active'
    ];
}
