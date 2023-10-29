<div id="notification" class="fixed top-[20px] w-full flex justify-center duration-500" >
  <div class="{{ $errors->any() ? 'bg-red-300' : 'bg-green-300' }} max-w-[250px] rounded-full py-2 px-5">
    <p class="font-bold text-center capitalize text-white text-sm">{{ $notificationDescription }}</p>
  </div>
</div>
