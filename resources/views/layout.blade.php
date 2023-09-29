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
  <main class="w-100 min-h-screen flex justify-center py-5">
    <section class="max-w-[480px] w-full">
      <header>
        <h1>{{ env('APP_NAME', 'App') }}</h1>
      </header>
      <h1>hello wolrd</h1>
      @yield('content')
    </section>
  </main>
</body>
</html>
