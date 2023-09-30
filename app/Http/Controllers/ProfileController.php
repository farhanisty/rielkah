<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class ProfileController extends Controller
{
  private UserRepository $userRepository;
  
  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }
  
  public function index(Request $request)
  {
    $userStats = $this->userRepository->getWithStatsWhereId(auth()->id());

    $view = $request->input('view');
    
    if($view !== "sort") {
      $view = "grid";
    }

    return view('pages.profile', [
      'page' => 'profile',
      'view' => $view,
      'userStats' => $userStats,
    ]);
  }

  public function showEdit(Request $request)
  {
    return view('pages.edit-profile');
  }
}
