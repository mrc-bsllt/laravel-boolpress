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

      @include("../templates.header")

      <main id="app">
        @yield("main-content")
      </main>

      <script src="{{ asset("js/app.js") }}" charset="utf-8"></script>
    </body>
</html>
