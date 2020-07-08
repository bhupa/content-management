<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable = [
        'user_id',
        'original_user_id',
        'model',
        'model_id',
        'action',
        'description',
        'before_details',
        'after_details',
        'ip_address'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
