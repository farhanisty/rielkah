<?php

namespace App\Repositories;

use App\Dto\PostWithcomments;
use Illuminate\Support\Collection;

interface PostRepository
{
  public function createPost(int $userId, string $image, string $caption, string $createdAt): void;

  public function getPostWhereId(int $id): PostWithComments;
  
  public function getPostsWhereUserId(int $id): Collection;
  
  public function getPostsWhereUsername(string $username): Collection;

  public function getPostsWhereFollowed(int $id): Collection;

  public function deletePostWhereId(int $id): void;
}
