@extends('layout.app')
@section('title', 'Blog Page')
@section('content')

<div class="top">
    <h2 class="my-4">Postes supprimés</h2>
    <div class="row">
        @foreach ($trashedPosts as $post)
        <div class="col-md-4 mb-4">
            <div class="card bg-tertiary">
                <img class="card-img-top" src="https://via.placeholder.com/300x200" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Id: {{$post->id}}</h4>
                    <h5 class="card-title">{{mb_strimwidth($post->title, 0, 20) }}</h5>
                    <p class="card-text">{{mb_strimwidth($post->body, 0, 40)}}</p>
                    {{-- <a href="#" class="btn btn-primary">Lire pluss</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection