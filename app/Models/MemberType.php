<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
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

    protected $table = 'member_type';


    protected $fillable = ['name', 'slug',  'display_order', 'is_active','type','member_type_id' ,'created_by', 'updated_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function member(){
        return $this->belongsTo(Members::class, 'member_type_id');
    }
}
