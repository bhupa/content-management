<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 9/20/18
 * Time: 12:08 PM
 */

namespace App\Repositories;




use App\Models\CareerForm;

class CareerFromRepository extends Repository
{
    public function __construct(CareerForm $careerform)
    {
        $this->model = $careerform;
    }

}