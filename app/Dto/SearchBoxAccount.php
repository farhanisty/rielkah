<?php

namespace App\Dto;

class SearchBoxAccount
{
  public function __construct(
    public string $photoProfileUrl,
    public string $username,
    public string $name,
    public bool $isFollow
  ) {}
}
