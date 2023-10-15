<?php

namespace App\Repositories;

interface PostRepository
{
  public function createPost(int $userId, string $image, string $caption, string $createdAt): void;
}
