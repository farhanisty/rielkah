@extends('layout')

@section('body')
  <main class="container py-5">
    <h1 class="text-2xl font-semibold">Edit Profile</h1>

    <section class="mt-10">
      <img src="{{ asset('assets/no-profile.svg') }}" class="rounded-full border-2 mx-auto" width="200" height="200" />
      <form>
        <ul>
          <li>
            <label class="block">name</label>
            <input type="text" />
          </li>
          <li>
            <label class="block">username</label>
            <input type="text" />
          </li>
        </ul>
        <div class="flex justify-between">
          <button type="submit" class="py-2 px-5 bg-blue-400 hover:bg-blue-500 text-white rounded-sm">Save Changes</button>
          <a href="{{ route('profile.index') }}" class="py-2 px-5 bg-slate-200 rounded-sm">Back to profile</a>
        </div>
      </form>
    </section>
  </main>
@endsection
