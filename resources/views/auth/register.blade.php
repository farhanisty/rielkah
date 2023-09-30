@extends('layout')

@section('body')
  <main class="min-h-screen w-screen flex justify-center items-center md:bg-slate-100">
    <div class="w-[400px] min-h-[450px] px-5 md:py-6 bg-white rounded md:drop-shadow-lg flex justify-center items-center">
      <div class="w-full">
        <h1 class="font-semibold text-slate-600 text-4xl text-center">Register</h1>
        <form method="post">
          @csrf

          @error('name')
          <p class="mt-3 text-red-700 mt-5 text-sm font-medium uppercase">{{ $errors->first('name') }}</p>
          @enderror

          <label for="name" class="{{ $errors->has('name') ? '' : 'mt-5' }} block text-slate-400 text-sm">Name</label>
          <input name="name" class="border-2 w-full p-2" autofocus type="text" />

          @error('username')
          <p class="mt-3 text-red-700 mt-3 text-sm font-medium uppercase">{{ $errors->first('username') }}</p>
          @enderror
          
          <label for="username" class="{{ $errors->has('username') ? '' : 'mt-3' }} block text-slate-400 text-sm">Username</label>
          <input name="username" class="border-2 w-full p-2" type="text" />

          @error('email')
          <p class="mt-3 text-red-700 mt-3 text-sm font-medium uppercase">{{ $errors->first('email') }}</p>
          @enderror
          
          <label for="email" class="{{ $errors->has('email') ? '' : 'mt-3' }} block text-slate-400 text-sm">Email</label>
          <input name="email" class="border-2 w-full p-2" type="text" />

          @error('password')
          <p class="mt-3 text-red-700 mt-3 text-sm font-medium uppercase">{{ $errors->first('password') }}</p>
          @enderror
          
          <label for="email" class="{{ $errors->has('password') ? '' : 'mt-3' }} block text-slate-400 text-sm">Password</label>
          <input name="password" class="border-2 w-full p-2" type="password"/>

          <button class="py-2 px-3 bg-blue-300 mt-4" type="submit">Register</button>
        </form>
        
        <p class="inline-block mt-9 text-xs">I've account, <a href="{{ route('login.index') }}" class="text-blue-500">log in</a></p>
      </div>
    </div>
  </main>
@endsection
