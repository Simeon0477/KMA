@extends('layout.app')
@section('title', $post->title)
@section('content')
<div class="container my-5">
    <div class="row" id="post">
        <hr>
        <div class="col-md-12 md-2">
            <div class="row d-flex align-items-start">
                <img class="col-md-3 md-2" src="{{ Storage::url($post->thumbImage) }}" alt="Blog Image" class="img-fluid mb-4">
                <h1 class="col-md-9 md-2">{{$post->title}}</h1>
            </div>
            <p class="text-muted">{{$post->published_at}} by {{$post->user->name}}.</p>
            <p style="text-align: justify;">{!! nl2br(e($post->body)) !!}</p>
            @if(isset($post->image))
                <img src="{{ Storage::url($post->image) }}" alt="Blog Image" class="img-fluid mb-4 rounded-5 post-img">
            @endif
            <p class="text-end">{{date("l jS \of F Y h:i:s A", strtotime($post->published_at ))}}</p>
            <p class="text-end">{{$post->user->name}}</p>
        </div>
        <hr>
    </div>

    <!-- Section Like -->
    <div class="d-flex align-items-center mb-4 float-end">
        @auth
        <form action="{{ route('posts.like', $post) }}" method="POST" class="me-2">
            @csrf
            <button type="submit" class="btn {{ Auth::user()->hasLiked($post) ? 'btn-danger' : 'btn-outline-danger' }}">
                <i class="bi bi-heart-fill me-1"></i> 
                {{ Auth::user()->hasLiked($post) ? 'Unlike' : 'Like' }}
            </button>
        </form>
        @endauth
        <span class="fw-bold">{{ $post->likes_count }} {{ Str::plural('like(s)', $post->likes_count) }}</span>
    </div>
            
    <!-- Section Commentaires -->
    <div class="comments-section mt-5">
        <h3 class="mb-4">Commentaires ({{ $post->comments->count() }})</h3>
        
        @auth
        <!-- Formulaire de commentaire -->
        <div class="card mb-4 border bg-transparent">
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-3">
                        <label for="content" class="form-label">Laisser un commentaire</label>
                        <textarea class="form-control @error('content') is-invalid @enderror bg-tertiary" 
                                  id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Publier</button>
                </form>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <a href="{{ route('login') }}">Connectez-vous</a> pour laisser un commentaire.
        </div>
        @endauth
                
                <!-- Liste des commentaires -->
                <div class="comments-list">
                    @forelse($post->comments as $comment)
                        <div class="card mb-3 bg-tertiary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="card-title">{{ $comment->user->name }}</h5>
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="card-text">{{ $comment->content }}</p>
                                
                                @auth
                                    @if(Auth::id() == $comment->user_id || Auth::user()->isAdmin())
                                    <div class="mt-2">
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-end" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-secondary">
                            Aucun commentaire pour le moment. Soyez le premier à commenter!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection