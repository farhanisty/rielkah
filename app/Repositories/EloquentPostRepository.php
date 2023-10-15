<?php

namespace App\Repositories;

use App\Repositories\PostRepository;
use App\Models\Post;

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
}
