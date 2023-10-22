<?php

namespace App\Dto;

class EditableUser
{
  public function __construct(
    public string $name,
    public ?string $profilePicture
  ) {}
}
