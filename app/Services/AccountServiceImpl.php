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
  
  public function follow(int $id): void
  {
    echo "hello world";
  }

  public function unfollow(int $id): void
  {
    echo "hello world";
  }

  public function isFollow(int $id): bool
  {
    return true;
  }
}
