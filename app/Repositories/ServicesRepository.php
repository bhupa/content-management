<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 10/7/18
 * Time: 10:33 AM
 */

namespace App\Repositories;

use App\Models\Services;

class ServicesRepository extends Repository
{
    public  function __construct(Services $service)
    {
        $this->model =  $service;
    }
}