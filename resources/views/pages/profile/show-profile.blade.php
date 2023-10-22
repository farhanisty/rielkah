@extends('footered')

@section('content')
  <div class="container pb-[4rem]">
    @include('components.user-statistic')

    <section class="my-5">
      <a href="{{ route(($userStats->isFollow) ? 'unfollow' : 'follow', $userStats->id) }}" class="w-full py-2 {{ $userStats->isFollow ? 'bg-slate-200 text-black hover:bg-slate-300' : 'bg-blue-400 hover:bg-blue-500 text-white' }} inline-block text-center rounded-md">{{ !$userStats->isFollow ? 'follow' : 'unfollow' }}</a>
    </section>

    @include('components.posts-profile')
  </div>
@endsection
