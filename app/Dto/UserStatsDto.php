<?php

namespace App\Dto;

class UserStatsDto
{
  public function __construct(
    public string $name,
    public string $username,
    public int $posts,
    public int $followers,
    public int $following,
  ) {}
}
