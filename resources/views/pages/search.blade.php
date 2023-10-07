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
    @foreach($accounts as $accountBox)
      @include('components.search-box-account')
    @endforeach
  </section>
</div>
@endsection
