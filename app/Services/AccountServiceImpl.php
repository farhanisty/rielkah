<?php

namespace App\Services;

use App\Repositories\FollowManagementRepository;

class AccountServiceImpl implements AccountService
{
  private FollowManagementRepository $followManagementRepository;

  public function __construct( FollowManagementRepository $followManagementRepository) 
  {
    $this->followManagementRepository = $followManagementRepository;
  }
  
  public function follow(int $userId, int $followedId): void
  {
    $this->followManagementRepository->insert($userId, $followedId);
  }

  public function unfollow(int $userId, int $followedId): void
  {
    echo "hello world";
  }

  public function isFollow(int $userId, int $followedId): bool
  {
    return true;
  }
}
