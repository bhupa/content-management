<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['caption','title','description','display_order', 'image', 'link', 'is_active', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status_by', 'deleted_by'];
}
