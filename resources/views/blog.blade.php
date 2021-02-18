@extends("layout.layout-main")

@section("main-content")
  <div class="container cards">
    @foreach ($posts as $post)
      <div class="card">
        <div class="card_content">
          <img src="https://www.webnode.it/blog/files/2019/05/blogger-di-successo.png" alt="">
          <a href="#">
            <h3>{{ $post->title }}</h3>
          </a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
