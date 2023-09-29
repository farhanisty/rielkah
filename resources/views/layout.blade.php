<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body>
  <main class="w-100 flex justify-center py-5">
    @yield('body')

    <div class="container fixed bg-white bottom-3 border-2 border-slate-300">
      <footer class="min-h-[4rem] flex justify-around items-center">
          <a href="{{ route('home.index') }}" class="{{ ($page == 'home') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/home.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('search.index') }}"class="{{ ($page == 'search') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/search.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('activity.index') }}" class="{{ ($page == 'activity') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/heart.png') }}" width="30" height="30" />
          </a>
          <a href="{{ route('profile.index') }}" class="{{ ($page == 'profile') ? 'bg-blue-100' : '' }} p-2 px-3">
            <img src="{{ asset('assets/icons/user.png') }}" width="30" height="30" />
          </a>
      </footer>
    </div>
  </main>
</body>
</html>
