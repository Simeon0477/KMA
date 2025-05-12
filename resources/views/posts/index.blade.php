@extends('layout.app')
@section('title', 'Kamermotion Art')
@section('content')

<section class="banner">
    <p>
        <span class="slogan">Kamermotion Art</span> <br> Le murmure de la culture camerounaise dans la danse des formes et des couleurs<br>
        <button>Inscrivez vous maintenant</button>
    </p>
    <img id="banner_image" src="{{ Vite::asset('resources/img/cmr.png') }}"/>
</section>

<h2 class="my-4">Postes Récents</h2>

@php
  $isFirst = true;
@endphp

<div class="row">
    @foreach ($posts as $post)
      @if ($isFirst)
        <div class="article" id="most-recent">
          <div>
            <img src="{{Storage::url($post->thumbImage)}}" alt="image" />
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
        <div class="col-12 col-md-6 col-lg-6 mb-3">
          <div class="card h-100 bg-tertiary">
            <div class="row g-0 h-100">
              <div class="col-4">  <!-- Utilisation de col-4 pour l'image -->
                <img src="{{Storage::url($post->thumbImage)}}" alt="Card image cap" class="img-fluid rounded-start h-100">
              </div>
              <div class="col-8">  <!-- Utilisation de col-8 pour le corps -->
                <div class="card-body">
                  <h5 class="card-title text-primary">{{mb_strimwidth($post->title, 0, 50) }}</h5>
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
@include('includes.Pagination', ['items' => $posts])
@endsection
