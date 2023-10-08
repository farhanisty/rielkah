<?php

namespace App\Dto;

class SearchBoxAccount
{
  public function __construct(
    public int $id,
    public string $profilePicture,
    public string $username,
    public string $name,
    public bool $isFollow
  ) {}
}
