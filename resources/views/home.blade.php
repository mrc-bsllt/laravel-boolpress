<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
      <header>

      </header>
      <main>
        <ul>
          @foreach ($posts as $post)
            <li>{{ $post->comments[0]->content }}</li>
          @endforeach
        </ul>
      </main>
    </body>
</html>
