<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function index(Request $request)
  {
    $view = $request->input('view');
    
    if($view !== "sort") {
      $view = "grid";
    }

    return view('pages.profile', [
      'page' => 'profile',
      'view' => $view
    ]);
  }
}
