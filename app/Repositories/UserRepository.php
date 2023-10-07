<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Dto\UserStatsDto;
use App\Dto\SearchBoxAccount;

interface UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto;

  public function getRecentlyAccountBox(): Collection;
}
