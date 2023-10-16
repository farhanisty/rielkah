<?php

namespace App\Repositories;

use App\Dto\PostDto;
use App\Repositories\PostRepository;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EloquentPostRepository implements PostRepository
{
  public function createPost(int $userId, string $image, string $caption, string $createdAt): void
  {
    Post::insert([
      'user_id' => $userId,
      'image' => $image,
      'caption' => $caption,
      'created_at' => $createdAt
    ]);
  }

  public function getPostsWhereId(int $id): Collection
  {
    $userPosts = User::select('username', 'profile_picture', DB::raw('posts.id, posts.caption, posts.created_at, posts.image'))
      ->join('posts', 'users.id', '=', 'posts.user_id')
      ->where('users.id', '=', $id)
      ->orderByRaw('posts.created_at desc')
      ->get();

    $posts = $userPosts->map(function($post, int $key) {
      return new PostDto($post->username, $post->profile_picture, $post->image, $post->caption, Carbon::parse($post->created_at)->diffForHumans());
    });


    return $posts;
  }
}
