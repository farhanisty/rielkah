<?php

namespace App\Repositories;

use App\Repositories\AuthenticationRepository;
use App\Models\User;

class EloquentAuthenticationRepository implements AuthenticationRepository
{
  public function register(string $name, string $username, string $email, string $password)
  {
    User::insert([
      'name' => $name,
      'username' => $username,
      'email' => $email,
      'password' => $password
    ]);
  }

  public function login(string $email, string $password): bool
  {
    
  }
}
