<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 10/7/18
 * Time: 10:33 AM
 */

namespace App\Repositories;

use App\Models\Store;
use App\Models\Testimonials;
use App\Models\Tranning;

class TranningRepository extends Repository
{
    public  function __construct(Tranning $tranning)
    {
        $this->model = $tranning;
    }
    
}