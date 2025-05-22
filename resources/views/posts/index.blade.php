@extends('layout.app')
@section('title', 'KamerMotion Art')
@section('content')

<section class="banner">
    <p>
        <span class="slogan">Kamermotion Art</span> <br> Le murmure de la culture camerounaise dans la danse des formes et des couleurs<br>
        <button onclick="window.location.href='{{route('register')}}'">Inscrivez vous maintenant</button>
    </p>
    <img id="banner_image" src="{{ Vite::asset('resources/img/image-1.jpg') }}"/>
</section>

<h2 class="my-4">Posts Récents</h2>

@php
  $isFirst = true;
@endphp

<div class="row">
    @foreach ($posts as $post)
      @if ($isFirst)
        <div class="article" id="most-recent">
          <div class="image-container">
            <a href="{{ route('posts.show', $post) }}"><img src="{{Storage::url($post->thumbImage)}}" alt="image"  class="image-scale"/></a>
          </div>
          <div class="titre">
            <div>
            <p class="titre_article">{{mb_strimwidth($post->title, 0, 50) }}</p>
            <p class="article_content">{{mb_strimwidth($post->body, 0, 150)}}...</p>
            </div>
            <div class="achat">
              <a href="{{ route('posts.show', $post) }}" class="add2">Voir plus</a>
            </div>
          </div>
        </div>
        @php
          $isFirst = false;
        @endphp
      @else
        <div class="col-12 col-md-6 col-lg-6 mb-3 posts">
          <div class="card h-100 bg-tertiary">
            <div class="row g-0 h-100">
              <div class="col-4 image-container">
                <a href="{{ route('posts.show', $post) }}"><img src="{{Storage::url($post->thumbImage)}}" alt="Card image cap" class="img-fluid rounded-start h-100 image-scale"></a>
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title text-primary">{{mb_strimwidth($post->title, 0, 200) }}</h5>
                  <p class="card-text">{{mb_strimwidth($post->body, 0, 100)}}...</p>
                  <a href="{{ route('posts.show', $post) }}" class="btn btn-primary float-end" style="margin-bottom:10px;">Voir plus</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
</div>
<h2 class="my-4">Nos animations</h2>
<div class="animate">
  <video autoplay muted loop playsinline controls>
    <source src="{{ Vite::asset('resources/video/Projet_3.mp4') }}" type="video/mp4"/>
  </video>
  <video autoplay muted loop playsinline controls>
    <source src="{{ Vite::asset('resources/video/video.mp4') }}" type="video/mp4"/>
  </video>
  <div class="hidden_video">
    <button class="add2" onclick="show()">Voir plus</button>
  </div>
</div>

<script>
  const hidden = document.querySelector(".hidden_video");


  function show(){
    hidden.innerHTML  = `<video autoplay muted loop playsinline controls>
      <source src="{{ Vite::asset('resources/video/Projet_1.mp4') }}" type="video/mp4"/>
    </video>
    <video autoplay muted loop playsinline controls>
      <source src="{{ Vite::asset('resources/video/Projet_2.mp4') }}" type="video/mp4"/>
    </video>
    <video autoplay muted loop playsinline controls>
      <source src="{{ Vite::asset('resources/video/Aloes_vera.mp4') }}" type="video/mp4"/>
    </video>
    <div class="hidden_video">
      <button class="add2" onclick="hide()">Voir moins</button>
    </div>`;
  }

  function hide(){
      hidden.innerHTML
      = `<div class="hidden_video">
      <button class="add2" onclick="show()">Voir plus</button>
    </div>`;
  }
</script>
@include('includes.Pagination', ['items' => $posts])
@endsection
