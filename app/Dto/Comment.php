<?php

namespace App\Dto;

class Comment
{
  public function __construct(
    public string $id,
    public string $userId,
    public string $postId,
    public string $username,
    public string $description,
    public string $createdAt,
    public ?string $replyId = null
  ) { }
}
