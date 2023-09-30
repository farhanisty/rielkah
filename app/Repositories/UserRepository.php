<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Dto\UserStatsDto;

interface UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto;
}
