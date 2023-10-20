@extends('layout')

@section('body')

<div class="container mt-5">
  <header class="mb-3">
    <a href="{{ $previousUrl }}" class="flex items-center gap-2">
      <img src="{{ asset('assets/icons/back.png') }}" width="30" />
      <p class="font-bold capitalize">back</p>
    </a>
    <div class="flex gap-3 items-center mt-5">
      <div class="rounded-full overflow-hidden w-[30px] h-[30px] justify-center items-center">
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

@endsection
