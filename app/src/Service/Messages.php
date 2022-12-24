<?php

namespace App\Service;

use App\DTO\Messages as DTOMessages;
use App\Entity\Message;

class Messages {
    public static function getMessages(): DTOMessages {
        // TODO: switch the following dummy with real data from the database
        /** @var Message $testMessage */
        $testMessage = new Message();
        $testMessage->setPostDate(date_create_immutable());
        $testMessage->setMessage('Test message');
        $test = [];
        array_push($test, $testMessage);

        /** @var DTOMessages $response */
        $response = new DTOMessages();
        $response->setSuccess(true);
        $response->addMessages(...$test);
        return $response;
    }
}