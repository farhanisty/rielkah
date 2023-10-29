<?php

namespace App\Dto;

class PostDto
{
  public function __construct(
    public string $id,
    public string $username,
    public ?string $profilePicture,
    public string $image,
    public string $caption,
    public int $countComments,
    public string $createdAt
  ) { }
}
