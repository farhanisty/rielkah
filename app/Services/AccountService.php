<?php

namespace App\Services;

interface AccountService
{
  public function follow(int $userId, int $followedId): void;

  public function unfollow(int $userId, int $followedId): void;

  public function isFollow(int $userId, int $followedId): bool;
}
