<?php

namespace App\Repositories;

use App\Dto\UserStatsDto;
use App\Dto\SearchBoxAccount;
use App\Models\User;
use App\Models\FollowManagement;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository implements UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto
  {
    $user = User::select('users.name', 'users.username', 'users.profile_picture','followers.follower', 'followed.followed')
      ->leftJoinSub($this->createFollowersTable(), 'followers', function(JoinClause $join) {
        $join->on('users.id', '=', 'followers.followed_id');
      })
      ->leftJoinSub($this->createFollowedTable(), 'followed', function(JoinClause $join) {
        $join->on('users.id', '=', 'followed.user_id');
      })
      ->where('users.id', "=", $id)
      ->first();

    if(!$user) {
      throw new Exception("Not Found");
    }
    
    return new UserStatsDto($user->name, $user->username, $user->profile_picture, 0, $user->follower ?? 0, $user->followed ?? 0);
  }

  public function getRecentlyAccountBox(string $param = null): Collection
  {
    $accounts = User::select('username', 'name', 'profile_picture')
      ->orderByDesc('created_at')
      ->where('id', "!=", auth()->id());
    
    if($param) {
      $accounts->where('username', 'like', '%' . $param . '%');
      $accounts->orWhere('email', 'like', '%' . $param . '%');
    }

    $accounts = $accounts
      ->limit(10)
      ->get();

    $accountsBox = $accounts->map(function($item, int $key) {
      return new SearchBoxAccount($item->profile_picture, $item->username, $item->name, false);
    });

    return $accountsBox;
  }

  private function createFollowersTable()
  {
    return FollowManagement::select('followed_id', DB::raw('count(user_id) as follower'))
      ->groupBy('followed_id');
  }

  private function createFollowedTable()
  {
    return FollowManagement::select('user_id', DB::raw('count(followed_id) as followed'))
      ->groupBy('user_id');
  }
}
