<?php

namespace App\Repositories;

class EloquentFollowManagementRepository implements FollowManagementRepository
{
  public function insert(int $userId, int $followedId): void
  {
    echo "hello world";
  }
}
