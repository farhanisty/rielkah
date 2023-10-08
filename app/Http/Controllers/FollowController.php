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
    echo $id;
  }

  public function unfollow()
  {
    
  }
}
