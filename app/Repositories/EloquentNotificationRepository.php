<?php

namespace App\Repositories;

use App\Dto\Notification;
use Illuminate\Support\Collection;

class EloquentNotificationRepository implements NotificationRepository
{
    public function getNotificationsWhereUserId(int $id): Collection
    {
        return collect([new Notification('1', '1', '2', 'Adit', 'http://localhost/rielkah/public/storage/profile-pictures/ScTBfG0Q848YsDUv6ku1l9qzAdJgnppKpu7R6Ejt.png', 'https://google.com', 1, '2023-10-10', '2023-10-10')]);
    }
}
