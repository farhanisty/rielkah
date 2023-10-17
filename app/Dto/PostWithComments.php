<?php

namespace App\Dto;
use Illuminate\Support\Collection;

class PostWithcomments extends PostDto
{
  public Collection $comments;
  
  public function __construct(
    string $id,
    string $username,
    ?string $profilePicture,
    string $image,
    string $caption,
    string $createdAt,
    Collection $comments
  ) { 
    parent::__construct($id, $username, $profilePicture, $image, $caption, $createdAt);

    $this->comments = $comments;
  }
}
