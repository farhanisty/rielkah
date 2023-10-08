<?php

namespace App\Repositories;

interface FollowManagementRepository
{
  public function insert(int $userId, int $followedId): void;
}
