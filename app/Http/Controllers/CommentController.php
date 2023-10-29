<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
        private CommentRepository $commentRepository
    ) { }
    
    public function store(PostCommentRequest $request)
    {
        $validated = $request->validated();

        $this->commentRepository->create($validated["post_id"], auth()->id(), $validated["description"], now(), $validated["reply_id"] ?? null);

        $request->session()->flash('notification', 'Succesfully add comment');
        
        return redirect()->back();
    }

}
