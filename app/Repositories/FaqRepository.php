<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 10/2/18
 * Time: 4:28 PM
 */

namespace App\Repositories;

use App\Models\Download;
use App\Models\Faq;

class FaqRepository extends Repository
{
    public function __construct(Faq $faq)
    {
        $this->model = $faq;
    }


}