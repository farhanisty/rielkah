<?php

namespace App\Dto;

class Notification
{
    public function __construct(
        public string $id,
        public string $userId,
        public string $friendId,
        public string $friendName,
        public string $friendProfile,
        public string $link,
        public int $type,
        public string $createdAt,
        public string $updatedAt
    ) {}
}