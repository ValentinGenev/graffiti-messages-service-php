<?php

namespace App\Service;

use App\DTO\Messages as DTOMessages;
use App\Interface\Message;

class Messages {
    public static function getMessages(): DTOMessages {
        // TODO: the Entities should be used here
        $message1 = null;
        $test = [];
        array_push($test, $message1);

        $response = new DTOMessages();
        $response->setSuccess(true);
        $response->addMessages(...$test);
        return new DTOMessages(true, []);
    }
}