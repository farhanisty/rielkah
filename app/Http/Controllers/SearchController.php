<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  private UserRepository $userRepository;
  
  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }
  
  public function index()
  {
    $accountBoxs = $this->userRepository->getRecentlyAccountBox();
    
    return view('pages.search', [
      'page' => 'search',
      'accounts' => $accountBoxs
    ]);
  }
}
