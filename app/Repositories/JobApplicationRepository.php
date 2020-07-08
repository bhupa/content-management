<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 11/19/18
 * Time: 4:33 PM
 */

namespace App\Repositories;



use App\Models\JobApplicaion;

class JobApplicationRepository extends Repository
{
    public function __construct(JobApplicaion $jobapplication)
    {
        $this->model = $jobapplication;
    }
}