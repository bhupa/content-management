<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'member';


    protected $fillable = ['name','image','address', 'slug','type','facebook','twitter','linkedin',  'display_order','member_type_id', 'is_active', 'created_by', 'updated_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public  function position(){
        return $this->belongsTo(MemberType::class,'member_type_id');
    }
}
