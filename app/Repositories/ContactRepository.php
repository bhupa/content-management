<?php
/**
 * Created by PhpStorm.
 * Author: Kokil Thapa <thapa.kokil@gmail.com>
 * Date: 6/27/18
 * Time: 12:25 PM
 */

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends Repository
{
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

}