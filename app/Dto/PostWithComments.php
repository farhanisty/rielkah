<?php

namespace App\Dto;
use Illuminate\Support\Collection;

class PostWithcomments extends PostDto
{
  public Collection $comments;
}
