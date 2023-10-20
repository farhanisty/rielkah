<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface CommentRepository
{
  public function getCommentsWherePostId(int $id): Collection;
}
