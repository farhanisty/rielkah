<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct(
    private PostRepository $postRepository
  ) { }
  
  public function index()
  {
    return view('pages/post/create-post');
  }

  public function create(CreatePostRequest $request)
  {
    $validated = $request->validated();

    try{
      $image = $request->file('image')->store('posts');
    }catch(Exception $exception){
      return redirect()->route('profile.index');
    }
    
    $this->postRepository->createPost(auth()->id(), $image ,$validated['description'], now());

    return redirect()->route('profile.index');
  }
}