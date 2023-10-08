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
  
  public function index(Request $request)
  {
    $isSearch = false;
    $searchInput = $request->input('search') ?? null;
    
    if($searchInput) {
      $accountBoxs = $this->userRepository->getRecentlyAccountBox($searchInput);
      $isSearch = true;
    }else {
      $accountBoxs = $this->userRepository->getRecentlyAccountBox();
    }

    return view('pages.search', [
      'page' => 'search',
      'isSearch' => $isSearch,
      'searchInput' => $searchInput,
      'accounts' => $accountBoxs
    ]);
  }
}
