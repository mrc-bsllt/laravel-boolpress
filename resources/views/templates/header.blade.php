<header>
  <ul class="d-flex justify-content-center align-items-center">
    <li class="{{ Route::currentRouteName() == "home" ? "active" : "" }} mx-1">
      <a href="{{ route("home") }}">Home</a>
    </li>
    <li class="{{ (Route::currentRouteName() == "blog") || Route::currentRouteName() == "post" ? "active" : "" }} mx-1">
      <a href="{{ route("blog") }}">Blog</a>
    </li>
  </ul>
</header>
