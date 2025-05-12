@extends('layout.app')
@section('title', 'Mon Profil')
@section('content')
<div class="container my-5">
    <div class="row" >
        <div class="col-md-10 offset-md-1">
            <div class="card mb-4  bg-tertiary">
                <div class="card-body">
                    <h1 class="card-title text-primary">Profil de {{ $user->name }}</h1>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Membre depuis:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
                    <p class="card-text"><strong>Rôle:</strong> {{ $user->isAdmin() ? 'Administrateur' : 'Utilisateur standard' }}</p>
                    <p class="card-text"><strong>Nombre de posts:</strong> {{ $user->posts->count() }}</p>
                </div>
            </div>

            <!-- Onglets pour naviguer entre les différentes sections -->
            <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" 
                            type="button" role="tab" aria-controls="posts" aria-selected="true">
                        Mes Posts
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" 
                            type="button" role="tab" aria-controls="comments" aria-selected="false">
                        Mes Commentaires
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="likes-tab" data-bs-toggle="tab" data-bs-target="#likes" 
                            type="button" role="tab" aria-controls="likes" aria-selected="false">
                        Mes Likes
                    </button>
                </li>
            </ul>

            <!-- Contenu des onglets -->
            <div class="tab-content" id="profileTabsContent">
                <!-- Onglet des posts -->
                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <div class="card mb-3">
                                <div class="card-body  bg-tertiary rounded">
                                    <h5 class="card-title text-primary">{{ $post->title }}</h5>
                                    <p class="card-text text-muted-primary">{{ $post->published_at }}</p>
                                    <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary float-end">Voir le post</a>
                                </div>
                                <div class="card-footer d-flex justify-content-between rounded">
                                    <span><i class="bi bi-heart-fill me-1 text-danger"><b>like(s)</b></i> {{ $post->likes_count }}</span>
                                    <span><i class="bi bi-chat-dots-fill me-1 text-success"><b>Commentaire(s)</b></i> {{ $post->comments->count() }}</span>
                                </div>
                            </div>
                        @endforeach
                        {{ $posts->links() }}
                    @else
                        <div class="alert alert-info">Vous n'avez pas encore créé de posts.</div>
                    @endif
                </div>

                <!-- Onglet des commentaires -->
                <div class="tab-pane fade accordion" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    @if($comments->count() > 0)
                        @foreach($comments as $key => $comment)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $key }}">
                                    <button class="accordion-button @if($key != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="collapse{{ $key }}">
                                        Sur: {{ $comment->post->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-tertiary">
                                        <p class="card-text">{{ Str::limit($comment->content, 200) }}</p>
                                        <p class="card-text">{{ $comment->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('posts.show', $comment->post) }}" class="btn btn-sm btn-primary">
                                            Voir le post
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $comments->links() }}
                    @else
                        <div class="alert alert-info">Vous n'avez pas encore commenté de posts.</div>
                    @endif
                </div>

                <!-- Onglet des likes -->
                <div class="tab-pane fade accordion" id="likes" role="tabpanel" aria-labelledby="likes-tab">
                    @if($likes->count() > 0)
                        @foreach($likes as $key => $like)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $key }}">
                                    <button class="accordion-button @if($key != 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="collapse{{ $key }}">
                                        {{ $like->post->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-tertiary">
                                        <p class="card-text">{{ Str::limit($like->post->body, 150) }}</p>
                                        <p class="card-text">Liké {{ $like->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('posts.show', $like->post) }}" class="btn btn-sm btn-primary">
                                            Voir le post
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $likes->links() }}
                    @else
                        <div class="alert alert-info">Vous n'avez pas encore liké de posts.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection