<?php

namespace App\Repositories;

use App\Dto\Notification as NotificationDto;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EloquentNotificationRepository implements NotificationRepository
{
    public function createNotification(int $userId, string $link, string $type, string $createdAt, ?string $updatedAt, string $friendId): void
    {
        Notification::insert([
            'user_id' => $userId,
            'link' => $link,
            'type' => $type,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
            'friend_id' => $friendId
          ]);
    }

    public function getNotificationsWhereUserId(int $id): Collection
    {
        $notifications = Notification::select(DB::raw('notifications.id, notifications.user_id, notifications.friend_id, users.username, users.profile_picture, notifications.link, notifications.type, notifications.created_at, notifications.updated_at'))
            ->join('users', 'users.id', '=', 'notifications.friend_id')
            ->where('notifications.user_id', '=', $id)
            ->orderByRaw('notifications.created_at desc')
            ->get();

        $results = $notifications->map(function($notification, int $key){
            return new NotificationDto($notification->id, $notification->user_id, $notification->friend_id, $notification->username, $notification->profile_picture, $notification->link, $notification->type, Carbon::parse($notification->created_at)->diffForHumans(), $notification->updated_at);
        });

        return collect($results);
    }
}
