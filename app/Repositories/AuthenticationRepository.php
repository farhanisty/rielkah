<?php

namespace App\Repositories;

interface AuthenticationRepository
{
  public function register(string $name, string $username, string $email, string $password);

  public function login(string $email, string $password): bool;
}
