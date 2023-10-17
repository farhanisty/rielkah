@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  
  @include('components.user-statistic')

  <section class="mt-10">
    <a class="inline-block py-2 md:px-10 bg-blue-400 border border-blue-400 text-white text-sm w-full text-center rounded-md hover:bg-blue-500" href="{{ route('profile.edit') }}">Edit Profile</a>
    <button id="logout-button" class="inline-block py-2 mt-3 bg-slate-100 w-full rounded-md text-center text-sm border border-red-200 hover:bg-slate-200">logout</button>
    
    <a class="text-sm inline-block mt-10 py-2 hover:text-white hover:bg-blue-400 w-full text-center text-blue-400 px-5 border border-blue-400 rounded-md" href="{{ route('post.index') }}">Create Post</a>
  </section>
  
  @include('components.posts-profile')

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
