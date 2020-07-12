<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 12/4/18
 * Time: 12:29 PM
 */

namespace App\Repositories;


use App\Models\Setting;

class SiteSettingRepository extends Repository
{
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

     public function updateByField($field, $value){
        $update = $this->model->where('key', $field)->first();
        $update->fill(['description' => $value])->save();
        return $update;
    }

    public function findValueByKey($field){
        $value = $this->model->where('key', $field)->value('description');
        return $value;
    }



}