<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface NotificationRepository
{
  public function createNotification(int $userId, string $link, string $type, string $createdAt, string $updatedAt, string $friendId): void;

  public function getNotificationsWhereUserId(int $id): Collection;
}
