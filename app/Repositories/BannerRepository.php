<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 9/13/18
 * Time: 10:23 AM
 */

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository extends Repository
{
    public function __construct(Banner $banner)
    {
        $this->model = $banner;
    }
}