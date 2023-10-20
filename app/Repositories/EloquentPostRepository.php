<?php

namespace App\Repositories;

use App\Dto\PostDto;
use App\Dto\PostWithcomments;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EloquentPostRepository implements PostRepository
{
  public function __construct(
    private CommentRepository $commentRepository
  ) { }
  
  public function createPost(int $userId, string $image, string $caption, string $createdAt): void
  {
    Post::insert([
      'user_id' => $userId,
      'image' => $image,
      'caption' => $caption,
      'created_at' => $createdAt
    ]);
  }

  public function getPostWhereId(int $id): PostWithComments
  {
    $post = Post::select('posts.id', 'caption', 'posts.created_at', 'image', DB::raw('users.username, users.profile_picture'))
      ->join('users', 'users.id', '=', 'posts.user_id')
      ->where('posts.id', '=', $id)
      ->first();

    $comments = $this->commentRepository->getCommentsWherePostId($id);

    return new PostWithComments($post->id, $post->username, $post->profile_picture, $post->image, $post->caption, Carbon::parse($post->created_at)->diffForHumans(), $comments);
  }

  public function getPostsWhereUserId(int $id): Collection
  {
    $userPosts = User::select('username', 'profile_picture', DB::raw('posts.id, posts.caption, posts.created_at, posts.image'))
      ->join('posts', 'users.id', '=', 'posts.user_id')
      ->where('users.id', '=', $id)
      ->orderByRaw('posts.created_at desc')
      ->get();

    $posts = $userPosts->map(function($post, int $key) {
      return new PostDto($post->id, $post->username, $post->profile_picture, $post->image, $post->caption, Carbon::parse($post->created_at)->diffForHumans());
    });

    return $posts;
  }

  public function getPostsWhereUsername(string $username): Collection
  {
    $userPosts = User::select('username', 'profile_picture', DB::raw('posts.id, posts.caption, posts.created_at, posts.image'))
      ->join('posts', 'users.id', '=', 'posts.user_id')
      ->where('users.username', '=', $username)
      ->orderByRaw('posts.created_at desc')
      ->get();

    $posts = $userPosts->map(function($post, int $key) {
      return new PostDto($post->id, $post->username, $post->profile_picture, $post->image, $post->caption, Carbon::parse($post->created_at)->diffForHumans());
    });


    return $posts;
  }
}
