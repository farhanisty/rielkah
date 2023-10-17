  <section class="border-t-2 border-slate-200 mt-10">
    <ul class="flex justify-around mt-5">
      <li class="cursor-pointer {{ ($view == 'grid') ? 'pb-3 border-b-2 border-slate-300' : '' }}"><a href="?view=grid"><img src="{{ asset('assets/icons/pixels.png') }}" alt="grid" width="25" height="25" /></a></li>
      <li class="cursor-pointer {{ ($view == 'sort') ? 'pb-3 border-b-2 border-slate-300' : '' }}"><a href="?view=sort"><img src="{{ asset('assets/icons/sort.png') }}" alt="grid" height="25" width="27" /></a></li>
    </ul>
  </section>

  @if(count($posts))
    @if($view === 'sort')
    <section class="mt-8 flex flex-col gap-y-3">
      @foreach($posts as $post)
        @include('components.post-box')
      @endforeach
    </section>
    @else
      <section class="mt-8">
        <ul class="grid grid-cols-3 gap-1">
          @foreach($posts as $post)
            @include('components.grid-post-item')
          @endforeach
        </ul>
      </section>
    @endif
  @else
    <p class="text-center pt-20 font-bold">No posts</p>
  @endif
