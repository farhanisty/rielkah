@extends('layout')

@section('body')
    @yield('content')
    
    <div class="container fixed bg-white bottom-3 border-2 border-slate-300">
      <footer class="min-h-[4rem] flex justify-around items-center">
          <a href="{{ route('home.index') }}" class="{{ ($page == 'home') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/home.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('search.index') }}"class="{{ ($page == 'search') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/search.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('activity.index') }}" class="{{ ($page == 'activity') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/heart.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('profile.index') }}" class="{{ ($page == 'profile') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/user.png') }}" width="30" height="30" />
          </a>
      </footer>
    </div>
@endsection
