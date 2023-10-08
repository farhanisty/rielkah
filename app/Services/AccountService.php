<?php

namespace App\Services;

interface AccountService
{
  public function follow(int $id): void;

  public function unfollow(int $id): void;

  public function isFollow(int $id): bool;
}
