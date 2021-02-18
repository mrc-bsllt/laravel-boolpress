<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset("css/app.css") }}">
      <link rel="stylesheet" href="{{ asset("css/style.css") }}">
      <title>Laravel</title>
    </head>
    <body>
      <header>
        <ul>
          <li>
            <a href="{{ route("home") }}">Home</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
        </ul>
      </header>

      <main>
        @yield("main-content")
      </main>

    </body>
</html>
