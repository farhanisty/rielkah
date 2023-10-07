<div class="flex justify-between items-center my-3">
  <div class="flex gap-5">
  <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex justify-center items-center">
  <img src="{{ $accountBox->profilePicture ? asset('assets/' . $accountBox->profilePicture) : asset('assets/no-profile.svg') }}" width="50" />
  </div>
  <div>
    <h1 class="font-semibold">{{ $accountBox->username }}</h1>
    <h2 class="font-light text-sm">{{ $accountBox->name }}</h2>
    </div>
  </div>
    @if($accountBox->isFollow)
      <button type="submit" class="bg-slate-200 px-5 py-1 border text-black rounded">followed</button>
    @else
      <form method="post" action="follow/farhannivta_23">
        <button type="submit" class="bg-blue-400 px-5 py-1 border text-white rounded">follow</button>
      </form>
    @endif
</div>
