<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Dto\UserStatsDto;
use App\Dto\SearchBoxAccount;
use App\Dto\EditableUser;

interface UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto;

  public function getRecentlyAccountBox(string $param = null): Collection;

  public function getEditableUser(int $id): EditableUser;

  public function editUser(int $id, EditableUser $user): void;
}
