<div class="text-sm py-3 flex items-center gap-3 border-b last:border-0">
  <div class="w-[35px] h-[35px] overflow-hidden rounded-full border-2">
    <img src="{{ asset('storage/' . $comment->profilePicture) }}" />
  </div>
  <div class="w-full">
    <div class="flex w-full justify-between">
      <h1 class="font-semibold mr-1 text-md">{{ $comment->username }}</h1>
      <time class="text-sm text-slate-400">{{ $comment->createdAt }}</time>
    </div>
      <p>{{ $comment->description }}</p>
  </div>
</div>
