<?php


namespace App\Repositories;


use App\Models\MemberType;
use App\Models\Message;

class MessageRepository extends Repository
{
    public function __construct(Message $message)
    {
        $this->model = $message;
    }
}