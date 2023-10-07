<?php

namespace App\Dto;

class SearchBoxAccount
{
  public function __construct(
    public string $profilePicture,
    public string $username,
    public string $name,
    public bool $isFollow
  ) {}
}
