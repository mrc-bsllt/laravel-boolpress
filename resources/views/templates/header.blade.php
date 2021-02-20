<header>
  <ul class="d-flex justify-content-center align-items-center">
    <li class="{{ Route::currentRouteName() == "home" ? "active" : "" }}">
      <a href="{{ route("home") }}">Home</a>
    </li>
    <li class="{{ (Route::currentRouteName() == "blog") || Route::currentRouteName() == "post" ? "active" : "" }}">
      <a href="{{ route("blog") }}">Blog</a>
    </li>
  </ul>
</header>
