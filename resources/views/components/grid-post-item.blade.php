<li class="aspect-square border">
  <a href="{{ route('post.show', $post->id) }}" class="after:content-[''] after:absolute after:top-0 after:right-0 after:bottom-0 after:left-0 after:bg-black after:opacity-20 after:hidden hover:after:block  relative h-full w-full overflow-hidden flex justify-center items-center">
    <img src="{{ asset('storage/' . $post->image) }}" />
  </a>
</li>
