@extends('layout')

@section('body')

<div class="container mt-5">
  <header>
    <a href="{{ $previousUrl }}" class="underline">Back</a>
    <div class="">
@dd($post)
      <div class="">
        <img src="{{ $post->profilePicture }}" />
      </div>
    </div>
  </header>
</div>

@endsection
