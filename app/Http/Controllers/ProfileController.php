<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Http\Requests\EditProfileRequest;
use App\Dto\EditableUser;

class ProfileController extends Controller
{
  private UserRepository $userRepository;
  private PostRepository $postRepository;
  
  public function __construct(UserRepository $userRepository, PostRepository $postRepository)
  {
    $this->userRepository = $userRepository;
    $this->postRepository = $postRepository;
  }
  
  public function index(Request $request)
  {
    $posts = $this->postRepository->getPostsWhereId(auth()->id());
    $userStats = $this->userRepository->getWithStatsWhereId(auth()->id());

    $view = $request->input('view');
    
    if($view !== "sort") {
      $view = "grid";
    }

    return view('pages.profile', [
      'page' => 'profile',
      'view' => $view,
      'userStats' => $userStats,
      'posts' => $posts
    ]);
  }

  public function showEdit()
  {
    $profile = $this->userRepository->getEditableUser(auth()->id());
    return view('pages.edit-profile', [
      'profile' => $profile
    ]);
  }

  public function postEdit(EditProfileRequest $request)
  {
    $filename = null;
    
    if($request->file('profile_picture')) {
      try{
        $filename = $request->file('profile_picture')->store('profile-pictures');
      }catch(Exception $exception) {
        return redirect()->back();
      }
    }  

    $this->userRepository->editUser(auth()->id(), new EditableUser($request->validated('name'), $filename));

    return redirect()->route('profile.index');
  }
}
