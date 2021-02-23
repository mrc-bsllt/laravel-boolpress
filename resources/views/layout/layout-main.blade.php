<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset("css/app.css") }}">
      <link rel="stylesheet" href="{{ asset("css/style.css") }}">
      <style media="screen">
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap');
      </style>
      <title>Laravel</title>
    </head>
    <body>

      @include("../templates.header")

      <main>
        @yield("main-content")
      </main>

      <script src="{{ asset("js/app.js") }}" charset="utf-8"></script>
    </body>
</html>
