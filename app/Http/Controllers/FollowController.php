<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
  public function __construct(
    private AccountService $accountService
  ) {}
  
  public function follow(int $id)
  {
    $this->accountService->follow(auth()->id(), $id);

    return back();
  }

  public function unfollow(int $id)
  {
    $this->accountService->unfollow(auth()->id(), $id);

    return back();
  }
}
