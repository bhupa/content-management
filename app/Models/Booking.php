<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='booking';
    protected $fillable=['first_name','last_name','phone','email','address','room_id','check_in','check_out','no_of_room','no_of_adult','no_of_child','is_active'];

        public function room(){
            return $this->belongsTo(Roomlist::class, 'room_id');
        }
}
