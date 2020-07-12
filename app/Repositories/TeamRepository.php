<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 10/7/18
 * Time: 10:33 AM
 */

namespace App\Repositories;

use App\Models\Members;

class TeamRepository extends Repository
{
    public  function __construct(Members $member)
    {
        $this->model =  $member;
    }
}