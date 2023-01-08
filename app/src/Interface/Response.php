<?php

namespace App\Interface;

use JsonSerializable;

interface Response extends JsonSerializable
{
    function setSuccess(bool $flag);
    function setError(Error $error);
}
