@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <header class="w-full pb-8">
      <h1 class="font-bold text-3xl uppercase">{{ env('APP_NAME', 'App') }}</h1>
  </header>

  <section class="w-full flex flex-col gap-y-3">
    @foreach($posts as $post)
      @include('components.post-box')
    @endforeach
  </section>
</div>
@endsection
