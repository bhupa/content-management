<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    protected $table = 'career_form';

    protected $fillable =['message','first_name','last_name','contact','email','degination','salary','file'];

}
