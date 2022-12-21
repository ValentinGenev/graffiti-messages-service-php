<?php

namespace App\Interface;

interface Response
{
    function setSuccess(bool $flag);
    function setError(Error $error);
}
