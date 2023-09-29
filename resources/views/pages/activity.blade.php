@extends('footered')

@section('content')
<div class="container pb-[4rem]">
  <header class="w-full pb-3">
      <h1 class="font-bold text-3xl uppercase">{{ env('APP_NAME', 'App') }}</h1>
  </header>

  <section class="w-full">
      <h1>Hello world</h1>
  </section>
</div>
@endsection
