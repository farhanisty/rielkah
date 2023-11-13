<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface NotificationRepository
{
  public function getNotificationsWhereUserId(int $id): Collection;
}
