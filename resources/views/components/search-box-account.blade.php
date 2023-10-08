<div class="flex justify-between items-center my-3">
  <div class="flex gap-5">
  <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex justify-center items-center">
  <img src="{{ $accountBox->profilePicture ? asset('assets/' . $accountBox->profilePicture) : asset('assets/no-profile.svg') }}" width="50" />
  </div>
  <div>
    <a href="{{ route('home.index') }}" class="font-semibold">{{ $accountBox->username }}</a>
    <h2 class="font-light text-sm">{{ $accountBox->name }}</h2>
    </div>
  </div>
      <a href="{{ route($accountBox->isFollow ? 'unfollow' : 'follow', $accountBox->id) }}" class="{{ $accountBox->isFollow ? 'bg-slate-200 text-black' : 'text-white bg-blue-400' }} w-[100px] text-center py-1 border rounded">{{ $accountBox->isFollow ? 'unfollow' : 'follow'}}</a>
</div>
