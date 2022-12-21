<?php

namespace App\Interface;

interface Error
{
    public function setCode(string $code);
    public function setMessage(string $message);
}