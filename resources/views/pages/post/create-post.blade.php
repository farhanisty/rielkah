@extends('layout')

@section('body')

<div class="container py-5">
  <h1 class="font-bold text-3xl uppercase mb-8">Create Post</h1>

  <div class="m-auto flex justify-center items-center w-[350px] border-2 border-black overflow-hidden h-[350px]">
    <h1 id="notification-image" class="text-xl text-slate-600 font-bold">Insert Your Image</h1>
    <img id="preview-image" class="hidden" />
  </div>

  <form method="post" enctype="multipart/form-data">
    @csrf
    <ul class="flex flex-col gap-2 mt-5">
      <li>
        @error('image')
          <p class="uppercase text-red-600 italic">{{ $errors->first('image') }}</p>
        @enderror

        <label class="inline-block mb-2 font-semibold text-slate-600 uppercase" for="image">Image</label>
        <input id="input-image" class="block" type="file" accept="image/*" name="image" />
      <li/>
      <li>
        @error('description')
          <p class="uppercase text-red-600 italic">{{ $errors->first('description') }}</p>
        @enderror
        
        <label class="inline-block mb-2 font-semibold text-slate-600 uppercase" for="description">description</label>
        <textarea class="py-1 px-2 text-sm focus:outline-none rounded border-2 w-full h-[80px] bg-slate-100 text-slate-600 resize-none" name="description"></textarea>
      <li/>
    </ul>

    <div class="my-5">
      <button class="py-2 w-[100px] bg-blue-400 hover:bg-blue-500 text-white" type="submit">Post</button>
      <a href="{{ route('profile.index') }}" class="inline-block text-center py-2 w-[100px] bg-slate-300 hover:bg-slate-200 text-slate-600">Back</a>
    </div>
  </form>
</div>

@endsection

@push('script')
  <script>
    document.getElementById('input-image').onchange = function () {
      const previewImage = document.getElementById('preview-image')
      var src = URL.createObjectURL(this.files[0])
      
      document.getElementById('notification-image').classList.add('hidden')
      previewImage.src = src
      previewImage.classList.remove('hidden')
    }
  </script>
@endpush
