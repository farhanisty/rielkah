<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct(
    private PostRepository $postRepository
  ) { }
  
  public function index()
  {
    return view('pages.home', [
      'page' => 'home',
      'posts' => $this->postRepository->getPostsWhereFollowed(auth()->id())
    ]);
  }
}
