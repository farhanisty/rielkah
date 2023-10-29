@extends('layout')

@section('body')

<div class="container mt-5 pb-[80px]">
  <header class="mb-3">
    <a href="{{ $previousUrl }}" class="flex items-center gap-2">
      <img src="{{ asset('assets/icons/back.png') }}" width="30" />
      <p class="font-bold capitalize">back</p>
    </a>
    <div class="flex gap-3 items-center mt-5">
      <div class="rounded-full overflow-hidden w-[30px] h-[30px] flex justify-center items-center">
        <img src="{{ asset('storage/' . $post->profilePicture) }}" width="30" />
      </div>
      <h1 class="font-semibold">{{ $post->username }}</h1>
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

@endsection

@if(session('status') || $errors->any())
@section('pusher')

  @php
    $notificationDescription = session('status') ?? $errors->first('username')
  @endphp
  
  @include('components/notification')

@endsection

@push('script')
  <script src="{{ asset('js/notificationMaker.js') }}"></script>
@endpush

@endif
