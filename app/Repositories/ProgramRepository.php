<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 9/9/18
 * Time: 10:57 AM
 */

namespace App\Repositories;

use App\Models\NewsSubscribe;
use App\Models\Programs;

class ProgramRepository extends Repository
{
    public function __construct(Programs $program)
    {
        $this->model = $program;
    }
}