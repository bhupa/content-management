<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $table = 'message';

    protected $fillable= ['team_id','description','is_active'];

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }
}
