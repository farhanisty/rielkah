<?php

namespace App\Repositories;

use App\Dto\EditableUser;
use App\Dto\UserStatsDto;
use App\Dto\SearchBoxAccount;
use App\Models\User;
use App\Models\Post;
use App\Models\FollowManagement;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository implements UserRepository
{
  public function getWithStatsWhereId(int $id): UserStatsDto
  {
    $user = User::select('users.name', 'users.username', 'users.profile_picture','followers.follower', 'followed.followed', 'posts.total_posts')
      ->leftJoinSub($this->createFollowersTable(), 'followers', function(JoinClause $join) {
        $join->on('users.id', '=', 'followers.followed_id');
      })
      ->leftJoinSub($this->createFollowedTable(), 'followed', function(JoinClause $join) {
        $join->on('users.id', '=', 'followed.user_id');
      })
      ->leftJoinSub($this->createPostTable(), 'posts', function(JoinClause $join) {
        $join->on('users.id', '=', 'posts.user_id');
      })
      ->where('users.id', "=", $id)
      ->first();

    if(!$user) {
      throw new \Exception("Not Found");
    }

    return new UserStatsDto($user->name, $user->username, $user->profile_picture, $user->total_posts ?? 0, $user->follower ?? 0, $user->followed ?? 0);
  }
  
  public function getWithStatsWhereUsername(string $username): UserStatsDto
  {
    $user = User::select('users.name', 'users.username', 'users.profile_picture','followers.follower', 'followed.followed', 'posts.total_posts')
      ->leftJoinSub($this->createFollowersTable(), 'followers', function(JoinClause $join) {
        $join->on('users.id', '=', 'followers.followed_id');
      })
      ->leftJoinSub($this->createFollowedTable(), 'followed', function(JoinClause $join) {
        $join->on('users.id', '=', 'followed.user_id');
      })
      ->leftJoinSub($this->createPostTable(), 'posts', function(JoinClause $join) {
        $join->on('users.id', '=', 'posts.user_id');
      })
      ->where('users.username', "=", $username)
      ->first();

    if(!$user) {
      throw new \Exception("Not Found");
    }

    return new UserStatsDto($user->name, $user->username, $user->profile_picture, $user->total_posts ?? 0, $user->follower ?? 0, $user->followed ?? 0);
  }

  public function getRecentlyAccountBox(string $param = null): Collection
  {
    $followManagements = FollowManagement::select()
      ->where('user_id', '=', auth()->id());
    
    $accounts = User::select('users.id', 'users.username', 'users.name', 'users.profile_picture', DB::raw('follow_management.followed_id is_follow'))
      ->leftJoinSub($followManagements, 'follow_management', function(JoinClause $join) {
        $join->on('users.id', '=', 'follow_management.followed_id');
      })->orderByDesc('users.created_at')
      ->where('users.id', "!=", auth()->id());

    
    if($param) {
      $accounts->where('username', 'like', '%' . $param . '%');
    }

    $accounts = $accounts
      ->limit(10)
      ->get();

    $accountsBox = $accounts->map(function($item, int $key) {
      return new SearchBoxAccount($item->id, $item->profile_picture, $item->username, $item->name, ($item->is_follow !== null) ? true : false);
    });

    return $accountsBox;
  }

  public function getEditableUser(int $id): EditableUser
  {
    $user = User::select("name", "profile_picture")
      ->where('id', '=', $id)
      ->first();

    return new EditableUser($user->name, $user->profile_picture);
  }

  public function editUser(int $id, EditableUser $user): void
  {
    User::where('id', $id)
      ->update([
        'name' => $user->name,
        'profile_picture' => $user->profilePicture
      ]);
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

  private function createPostTable()
  {
    return Post::select('user_id', DB::raw('count(id) as total_posts'))
      ->groupby('user_id');
  }
}
