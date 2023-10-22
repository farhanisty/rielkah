@extends('layout')

@section('body')
  <main class="container py-5">
    <h1 class="text-2xl font-semibold">Edit Profile</h1>

    <section class="mt-10">
      @error('profile_picture')
        <p class="text-red-500 font-semibold uppercase my-2">{{ $errors->first('profile_picture') }}</p>
      @enderror
      <div class="flex justify-center items-center w-[200px] h-[200px] mx-auto rounded-full overflow-hidden border-2">
        <img id="profile-picture-review" src="{{  asset($profile->profilePicture ? 'storage/' . $profile->profilePicture : 'assets/no-profile.svg') }}" width="200"/>
      </div>
      <form method="post" enctype="multipart/form-data">
        @csrf
        <ul class="mt-5 mb-10">
          <li class="">
            <input id="input-profile-picture" type="file" name="profile_picture" accept="image/*" />
          </li>
          <li>
            @error('name')
              <p class="text-red-500 font-semibold uppercase my-2">{{ $errors->first('name') }}</p>
            @enderror
            
            <label class="block font-semibold text-md capitalize mb-2">name</label>
            <input class="w-full p-2 border rounded-sm focus:outline-none text-slate-600 text-md font-semibold" type="text" name="name" value="{{ $profile->name }}" placeholder="name" />
          </li>
        </ul>

        <div class="flex flex-col gap-y-5">
          <button type="submit" class="py-2 px-5 bg-blue-400 hover:bg-blue-500 text-white rounded-sm">Save Changes</button>
          <a href="{{ route('profile.index') }}" class="py-2 px-5 bg-slate-200 rounded-sm text-center">Back to profile</a>
        </div>
      </form>
    </section>
  </main>
@endsection

@push('script')
  <script>
    document.getElementById('input-profile-picture').onchange = function () {
      var src = URL.createObjectURL(this.files[0])
      document.getElementById('profile-picture-review').src = src
    }
  </script>
@endpush
