<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentCount extends Model
{
    use SoftDeletes;
    
    protected  $table = 'content_count';
    
    protected $fillable =[
      'name',
        'icon',
        'count',
        'is_active',
        'description'
        
    ];
}
