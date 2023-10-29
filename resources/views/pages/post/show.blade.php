@extends('layout')

@section('body')

<div class="container mt-5 pb-[80px]">
  <header class="mb-3">
    <button onClick="history.back()" class="flex items-center gap-2">
      <img src="{{ asset('assets/icons/back.png') }}" width="30" />
      <p class="font-bold capitalize">back</p>
    </button>
    <div class="flex justify-between items-center mt-5">
      <div class="flex gap-3 items-center">
        <div class="rounded-full overflow-hidden w-[30px] h-[30px] flex justify-center items-center">
          <img src="{{ asset($post->profilePicture ? 'storage/' . $post->profilePicture : 'assets/no-profile.svg') }}" width="30" />
        </div>
        <h1 class="font-semibold">{{ $post->username }}</h1>
      </div>

      @if($post->userId == auth()->id())
        <button id="delete-post-button"><img class="" width="25"  src="{{ asset('assets/icons/delete.png') }}" /></button>

        <form id="delete-form" class="hidden" method="post" action="{{ route('post.destroy', $post->id) }}">
          @csrf
        </form>
      @endif
    </div>
  </header>

  <section class="pt-5 border-t-2">
    <div class="w-full aspect-square border flex justify-center items-center overflow-hidden">
      <img src="{{ asset('storage/' . $post->image) }}" class="w-full" />
    </div>
  </section>

  <section class="py-2 text-sm">
    <time class="inline-block font-light mb-3">{{ $post->createdAt }}</time>
    <p><span class="font-semibold mr-1 text-md">{{ $post->username }}</span>{{ $post->caption }}</p>
  </section>

  <section class="block mt-8 border-t-2 pt-3">
    <h1 class="font-semibold text-slate-400">Comments {{ count($post->comments) }}</h1>
    <div class="my-5">
      @foreach($post->comments as $comment)
        @include('components.comment-box')
      @endforeach
    </div>
  </section>
</div>

  <section class="fixed bottom-0 w-full bg-white flex justify-center pb-2">
    <div class="container">
      <div class="border-t-2 pt-3">
        <form method="post" action="{{ route('comment.store', $post->id) }}">
          @csrf
          <div class="relative">
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            <input type="text" name="description" class="relative border-2 h-[60px] w-full inline-block pl-2 pr-16 text-slate-600 rounded focus:outline-none" placeholder="write comment here"/>
            <div class="absolute right-2 top-0 h-full flex items-center">
              <button type="submit" class="p-1 border-2 border-blue-400 rounded hover:bg-blue-400"><img class="hover:invert hover:sepia hover:saturate-0 hover:hue-rotate[2deg] hover:contrast[104%]" style="filter: brightness(0) saturate(100%) invert(67%) sepia(28%) saturate(6404%) hue-rotate(192deg) brightness(102%) contrast(105%);" src="{{ asset('assets/icons/send.png') }}" width="30" alt="send comment"/></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

@section('pusher')

  @if(session('notification') || $errors->any())

    @php
      $notificationDescription = session('notification') ?? $errors->first('username')
    @endphp
    
    @include('components/notification')

  @endif

  <div id="delete-modal" class="fixed w-screen h-screen bg-black bg-opacity-20 top-0 hidden">
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full px-20">
      <div class="bg-white md:max-w-[250px] py-5 px-5 rounded-md md:mx-auto">
        <p class="">Are you sure want to delete this post?</p>
        <ul>
          <li class="my-3"><button id="confirm-delete-button" class="text-white inline-block bg-blue-400 hover:bg-blue-500 w-full py-2 text-center rounded-sm">Delete</button></li>
          <li><button id="cancel-delete-button" class="inline-block w-full py-2 bg-slate-100 hover:bg-slate-200 rounded-sm">Cancel</button></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@endsection


@push('script')

  @if(session('notification') || $errors->any())
    <script src="{{ asset('js/notificationMaker.js') }}"></script>
  @endif

  <script>
    @if($post->userId == auth()->id())
      const deletePostButton = document.querySelector("#delete-post-button");
      const deleteModal = document.querySelector("#delete-modal");
      const canceldeleteButton = document.querySelector("#cancel-delete-button");
      const confirmDeleteButton = document.querySelector("#confirm-delete-button");

      deletePostButton.addEventListener('click', function() {
        deleteModal.classList.remove("hidden");
      })

      canceldeleteButton.addEventListener('click', function() {
        deleteModal.classList.add("hidden")
      })

      confirmDeleteButton.addEventListener('click', function() {
        document.querySelector('#delete-form').submit()
      })
    @endif
    
  </script>
  
@endpush
