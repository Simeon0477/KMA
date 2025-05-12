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
<div class="row">
    @foreach ($posts as $post)
        @if ($post->id === 0)
            <div class="article" id="most-recent">
              <div>
                <img src="{{Storage::url($post->thumbImage)}}" alt="image" />
              </div>
              <div class="titre">
                <div>
                <p class="titre_article">{{mb_strimwidth($post->title, 0, 50) }}</p>
                <p class="article_content">{{mb_strimwidth($post->body, 0, 40)}}..</p>
                </div>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Voir plus</a>
              </div>
            </div>
        @else
            <div class="col-md-6 mb-5">
                <div class="card bg-tertiary">
                    <img class="card-img-top" src="{{Storage::url($post->thumbImage)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{mb_strimwidth($post->title, 0, 50) }}</h5>
                        <p class="card-text">{{mb_strimwidth($post->body, 0, 100)}}...</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

</div>
@include('includes.Pagination', ['items' => $posts])
@endsection
<!-- Storage::disk('public')->url($post->thumbImage) -->