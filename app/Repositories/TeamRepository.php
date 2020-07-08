<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 10/7/18
 * Time: 10:33 AM
 */

namespace App\Repositories;

use App\Models\Services;
use App\Models\Team;

class TeamRepository extends Repository
{
    public  function __construct(Team $team)
    {
        $this->model =  $team;
    }
}