@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <header class="w-full pb-3">
      <h1 class="font-bold text-3xl uppercase">{{ env('APP_NAME', 'App') }}</h1>
  </header>

  <section class="w-full">

  @foreach($notifications as $notification)
      <a  href="{{ $notification->link }}">
        <div class="flex items-center gap-5 justify-between">
        <div class="flex items-center gap-5">
        <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex justify-center items-center border">
            <img width="50" src="{{ $notification->friendProfile }}" alt="">
        </div>

        <p><span class="font-bold">{{ $notification->friendName }}</span> started following you. <date class="text-gray-400">{{$notification->createdAt}}</date></p>
        </div>


        <a class="text-white bg-blue-400 hover:bg-blue-500 w-[100px] text-center py-1 border rounded" href="https://youtube.com">follow</a>
</div>
    </a>
    @endforeach
  </section>
</div>
@endsection
