<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SiteSetting extends Model
{

    protected  $table = 'site_settings';

    protected $fillable = [
        'name',
        'value',
        'publish',
        'slug',
        'type'
    ];


    public function getPhone(){
      $phone =$this->where('name','phone')->first;

      return $phone['value'];
    }
}
