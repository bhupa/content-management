<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 9/20/18
 * Time: 12:08 PM
 */

namespace App\Repositories;

use App\Models\Content;
use App\Models\ContentBanner;
use DB;

class ContentBannerRepository extends Repository
{
    public function __construct(ContentBanner $contentbanner)
    {
        $this->model = $contentbanner;
    }

}