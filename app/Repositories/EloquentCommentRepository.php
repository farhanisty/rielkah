<?php

namespace App\Repositories;

use App\Repositories\CommentRepository;
use App\Models\Comment;
use App\Dto\Comment as CommentDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EloquentCommentRepository implements CommentRepository
{
  public function create(int $postId, int $userId, string $description, string $createdAt, ?bool $replyId = null): void
  {
    Comment::insert([
      'post_id' => $postId,
      'user_id' => $userId,
      'description' => $description,
      'created_at' => $createdAt,
      'reply_id' => $replyId,
    ]);
  }
  
  public function getCommentsWherePostId(int $id): Collection
  {
    $comments = Comment::select('comments.id',  'user_id', 'post_id', 'description','comments.created_at', 'reply_id', DB::raw('users.username'))
      ->join('users', 'users.id', '=', 'comments.user_id')
      ->where('comments.post_id', '=', $id)
      ->get();

    return $comments->map(function($comment,int $key) {
      return new CommentDto($comment->id, $comment->user_id, $comment->post_id, $comment->username, $comment->description, $comment->created_at, $comment->reply_id);
    });
  }
}
