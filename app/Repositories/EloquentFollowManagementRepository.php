<?php

namespace App\Repositories;

use App\Models\FollowManagement;

class EloquentFollowManagementRepository implements FollowManagementRepository
{
  public function insert(int $userId, int $followedId): void
  {
    FollowManagement::insert([
      'user_id' => $userId,
      'followed_id' => $followedId
    ]);
  }

  public function delete(int $id): void
  {
    
  }
}
