<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface CommentRepository
{
  public function create(int $postId, int $userId, string $description, string $createdAt, ?bool $replyId = null): void;
  
  public function getCommentsWherePostId(int $id): Collection;
}
