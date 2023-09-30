<?php

namespace App\Repositories;

use App\Dto\UserStatsDto;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository implements UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto
  {
    return new UserStatsDto('Farhannivta Ramadhana', 'farhannivta', 0, 1, 0);
  }
}
