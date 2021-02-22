<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>CRUD</title>
  </head>
  <body>

    <main id="crud">
      <div class="container table_container py-5">
        @yield("crud-content")
      </div>
    </main>

  </body>
</html>
