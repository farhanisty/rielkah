<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NotificationRepository;

class ActivityController extends Controller
{
    public function __construct(
        private NotificationRepository $notificationRepository
    ) {}
  public function index()
  {
    $notifications = $this->notificationRepository->getNotificationsWhereUserId(auth()->id());

    return view('pages.activity', [
      'page' => 'activity',
      'notifications' => $notifications
    ]);
  }
}
