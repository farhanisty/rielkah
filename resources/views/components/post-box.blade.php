<article class="border py-3 rounded-sm">
  <header class="flex items-center gap-x-2 px-2">
    <div class="flex justify-center items-center rounded-full w-[30px] h-[30px] border overflow-hidden">
      <img src="{{ asset($post->profilePicture ? 'storage/' . $post->profilePicture : 'assets/no-profile.svg') }}" width="30" />
    </div>
    <h1 class="font-semibold text-sm">{{ $post->username }}</h1>
  </header>
  
  <main class="my-3">
    <div class="w-full aspect-square border-y flex justify-center items-center mb-3 overflow-hidden">
      <img src="{{asset('storage/' . $post->image)}}" class="w-full" />
    </div>

    <section class="px-2 text-sm">
      <time class="inline-block font-light mb-3">{{ $post->createdAt }}</time>
      <p><span class="font-semibold mr-1 text-md">{{ $post->username }}</span>{{ $post->caption }}</p>
      <p class="mt-2 text-slate-500">{{  $post->countComments }} comments</p>
      <a href="{{ route('post.show', $post->id) }}" class="inline-block mt-2 text-slate-400 underline">see more</a>
    </section>

  </main>
</article>
