@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <header class="w-full pb-3">
      <h1 class="font-bold text-3xl uppercase">Search</h1>
  </header>

  <section class="w-full pt-3 md:pt-8 border-b border-slate-200 pb-5">
      <form class="flex gap-2">
        <input class="bg-slate-200 p-2 flex-grow rounded focus:outline-none text-slate-700" placeholder="search account..." type="text" name="search" />
      </form>
  </section>

  <section class="py-3">
    @if($isSearch)
      <h1 class="text-sm italic pb-4">Result for '<span class="font-semibold">{{ $searchInput }}</span>'</h1>
      @if(count($accounts))
        @foreach($accounts as $accountBox)
          @include('components.search-box-account')
        @endforeach
      @else
        <div class="flex justify-center items-center flex-col pt-10">
          <h1 class="text-md italic pb-4 text-center"><span class="font-semibold">'{{ $searchInput }}</span>' account is not found</h1>
          <a class="bg-red-400 hover:bg-red-500 text-white py-1 px-4 rounded mx-auto" href="{{ route('search.index') }}">Go back</a>
        </div>
      @endif
    @else
      @if(count($accounts))
        @foreach($accounts as $accountBox)
          @include('components.search-box-account')
        @endforeach
      @else
        <h1 class="text-md italic pb-4 text-center pt-3">no other user</h1>
      @endif
    @endif

  </section>
</div>
@endsection
