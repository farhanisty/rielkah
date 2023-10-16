<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface PostRepository
{
  public function createPost(int $userId, string $image, string $caption, string $createdAt): void;

  public function getPostsWhereId(int $id): Collection;
}
