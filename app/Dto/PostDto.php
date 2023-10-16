<?php

namespace App\Dto;

class PostDto
{
  public function __construct(
    public string $username,
    public ?string $profilePicture,
    public string $image,
    public string $caption,
    public string $createdAt
  ) { }
}
