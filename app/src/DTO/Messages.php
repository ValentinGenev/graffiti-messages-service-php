<?php

namespace App\DTO;

use App\Entity\Message;
use App\Interface\Response;
use App\Interface\Error;

class Messages implements Response
{
    private bool $success;
    private ?Error $error;
    private array $messages = [];

    public function setSuccess(bool $flag)
    {
        $this->success = $flag;
    }

    public function setError(Error $error)
    {
        $this->error = $error;
    }

    public function addMessages(Message ...$messages)
    {
        array_push($this->messages, ...$messages);
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
