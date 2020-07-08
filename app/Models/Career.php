<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Career extends Model
{
   
    protected $table = 'career';

    protected $fillable =['position','number','qualification','slug','publish_date','expire_date','experience','is_active','job_description'];

}
