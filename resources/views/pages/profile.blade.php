@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <section class="w-full pt-5">
      <h1 class="text-2xl text-slate-700 font-bold">{{ $userStats->name }}</h1>
      <h2 class="text-sm text-slate-600 font-light">{{ '@' . $userStats->username }}</h2>
  </section>
  
  <section class="mt-10 md:mt-5 flex gap-10">
    <div class="rounded-full border-2 border-slate-200 overflow-hidden w-[160px] h-[160px] flex justify-center items-center">
      <img src="{{ $userStats->profilePicture ? asset('storage/' . $userStats->profilePicture) : asset('assets/no-profile.svg') }}" class="" width="160" />
    </div>
    <ul class="flex flex-col gap-3">
      <li><h3 class="text-md font-semibold">posts</h3><span class="text-slate-600">{{ $userStats->posts }}</span></li>
      <li><h3 class="text-md font-semibold">followers</h3><span class="text-slate-600">{{ $userStats->followers }}</span></li>
      <li><h3 class="text-md font-semibold">following</h3><span class="text-slate-600">{{ $userStats->following }}</span></li>
    </ul>
  </section>

  <section class="mt-10">
    <a class="inline-block py-2 md:px-10 bg-blue-400 border border-blue-400 text-white text-sm w-full text-center rounded-md hover:bg-blue-500" href="{{ route('profile.edit') }}">Edit Profile</a>
    <button id="logout-button" class="inline-block py-2 mt-3 bg-slate-100 w-full rounded-md text-center text-sm border border-red-200 hover:bg-slate-200">logout</button>
    
    <a class="text-sm inline-block mt-10 py-2 hover:text-white hover:bg-blue-400 w-full text-center text-blue-400 px-5 border border-blue-400 rounded-md" href="{{ route('post.index') }}">Create Post</a>
  </section>

  <section class="border-t-2 border-slate-200 mt-10">
    <ul class="flex justify-around mt-5">
      <li class="cursor-pointer {{ ($view == 'grid') ? 'pb-3 border-b-2 border-slate-300' : '' }}"><a href="?view=grid"><img src="{{ asset('assets/icons/pixels.png') }}" alt="grid" width="25" height="25" /></a></li>
      <li class="cursor-pointer {{ ($view == 'sort') ? 'pb-3 border-b-2 border-slate-300' : '' }}"><a href="?view=sort"><img src="{{ asset('assets/icons/sort.png') }}" alt="grid" height="25" width="27" /></a></li>
    </ul>
  </section>

  @if(count($posts))
    @if($view === 'sort')
    <section class="mt-8 flex flex-col gap-y-3">
      @foreach($posts as $post)
        @include('components.post-box')
      @endforeach
    </section>
    @else
      <p>grid view</p>
    @endif
  @else
    <p class="text-center pt-20 font-bold">You Haven't create any post</p>
  @endif

</div>
@endsection

@section('pusher')
<div id="logout-modal" class="fixed w-screen h-screen bg-black bg-opacity-20 top-0 hidden">
  <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full px-20">
    <div class="bg-white md:max-w-[250px] py-5 px-5 rounded-md md:mx-auto">
      <p class="">Are you sure want to logout?</p>
      <ul>
        <li class="my-3"><a href="{{ route('logout') }}" class="text-white inline-block bg-blue-400 hover:bg-blue-500 w-full py-2 text-center rounded-sm">Logout</a></li>
        <li><button id="cancel-logout-button" class="inline-block w-full py-2 bg-slate-100 hover:bg-slate-200 rounded-sm">Cancel</button></li>
      </ul>
    </div>
  </div>
</div>
@endsection

@push('script') 
  <script>
    const logoutButton = document.querySelector("#logout-button");
    const logoutModal = document.querySelector("#logout-modal");
    const cancelLogoutButton = document.querySelector("#cancel-logout-button");

    logoutButton.addEventListener('click', function() {
      logoutModal.classList.remove("hidden");
    })

    cancelLogoutButton.addEventListener('click', function() {
      logoutModal.classList.add("hidden")
    })

  </script>
@endpush
