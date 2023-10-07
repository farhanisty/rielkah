@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <header class="w-full pb-3">
      <h1 class="font-bold text-3xl uppercase">Search</h1>
  </header>

  <section class="w-full pt-3 md:pt-8">
      <form class="flex gap-2">
        <input class="border-2 p-2 flex-grow rounded" placeholder="search account..." type="text" />
      </form>
  </section>
</div>
@endsection
