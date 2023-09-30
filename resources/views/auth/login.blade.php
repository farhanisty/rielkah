@extends('layout')

@section('body')
  <main class="min-h-screen w-screen flex justify-center items-center md:bg-slate-100">
    <div class="w-[400px] min-h-[450px] px-5 py-3 bg-white rounded md:drop-shadow-lg flex justify-center items-center">
      <div class="w-full">
        <h1 class="font-semibold text-slate-600 text-4xl text-center">Login</h1>
        @error('failed')
          <p class="mt-3 text-red-700 font-medium uppercase">{{ $errors->first('failed') }}</p>
        @enderror
        <form method="post">
          @csrf
          
          @error('email')
            <p class="mt-3 text-red-700 font-medium uppercase">{{ $errors->first('email') }}</p>
          @enderror
          <label for="email" class="block mt-1 text-slate-400 text-sm">Email</label>
          <input name="email" class="border-2 w-full p-2" autofocus type="text" />

          @error('password')
            <p class="mt-3 text-red-700 font-medium uppercase">{{ $errors->first('password') }}</p>
          @enderror
          <label for="password" class="block {{ $errors->has('password') ? '' : 'mt-3' }} text-slate-400 text-sm">Password</label>
          <input name="password" class="border-2 w-full p-2" type="password"/>

          <button class="py-2 px-3 bg-blue-300 mt-4" type="submit">Login</button>
        </form>
        
        <p class="inline-block mt-9 text-xs">I didn't have account yet, <a href="{{ route('register.index') }}" class="text-blue-500">sign up</a></p>
      </div>
    </div>
  </main>
@endsection
