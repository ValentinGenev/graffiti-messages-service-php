<?php

namespace App\Interface;

interface Message
{
    public function setId(int $id);
    public function setPostDate(int $postDate);
    public function setPosterId(int $posterId);
    public function setMessage(int $message);
    public function setTags(?array $tags);
}
