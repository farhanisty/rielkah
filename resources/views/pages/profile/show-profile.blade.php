@extends('footered')

@section('content')
  <div class="container pb-[4rem]">
    @include('components.user-statistic')

    <section class="my-5">
      <a href="" class="w-full py-2 bg-blue-400 inline-block text-white text-center rounded-md">Follow</a>
    </section>

    @include('components.posts-profile')
  </div>
@endsection
