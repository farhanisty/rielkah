<section class="w-full pt-5">
    <h1 class="text-2xl text-slate-700 font-bold">{{ $userStats->name }}</h1>
    <h2 class="text-sm text-slate-600 font-light">{{ '@' . $userStats->username }}</h2>
</section>

<section class="mt-10 md:mt-5 flex gap-10">
  <div class="rounded-full border-2 border-slate-200 overflow-hidden w-[160px] h-[160px] flex justify-center items-center">
    <img src="{{ $userStats->profilePicture ? asset('storage/' . $userStats->profilePicture) : asset('assets/no-profile.svg') }}" class="" width="160" />
  </div>
  <ul class="flex flex-col gap-3">
    <li><h3 class="text-md font-semibold">posts</h3><span class="text-slate-600">{{ $userStats->posts }}</span></li>
    <li><h3 class="text-md font-semibold">followers</h3><span class="text-slate-600">{{ $userStats->followers }}</span></li>
    <li><h3 class="text-md font-semibold">following</h3><span class="text-slate-600">{{ $userStats->following }}</span></li>
  </ul>
</section>
