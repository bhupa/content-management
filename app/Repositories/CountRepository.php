<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 9/20/18
 * Time: 12:08 PM
 */

namespace App\Repositories;

use App\Models\Content;
use App\Models\ContentCount;
use DB;

class CountRepository extends Repository
{
    public function __construct(ContentCount $count)
    {
        $this->model = $count;
    }

}