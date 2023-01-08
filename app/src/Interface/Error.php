<?php

namespace App\Interface;

use JsonSerializable;

interface Error extends JsonSerializable
{
    public function setCode(string $code);
    public function setMessage(string $message);
}