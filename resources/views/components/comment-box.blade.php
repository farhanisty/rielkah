<div class="text-sm py-3 flex items-center border-b last:border-0">
  <div class="rounded-full overflow-hidden w-[30px] h-[30px] flex justify-center items-center">
    <img src="{{ asset('storage/' . $comment->profilePicture) }}" />
  </div>
  <div class="w-full pl-3">
    <div class="flex w-full justify-between">
      <h1 class="font-semibold mr-1 text-md">{{ $comment->username }}</h1>
      <time class="text-sm text-slate-400">{{ $comment->createdAt }}</time>
    </div>
      <p>{{ $comment->description }}</p>
  </div>
</div>
