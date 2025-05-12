@extends('layout.app')
@section('title', 'Posts List')
@section('content')
@include('includes.Pagination', ['items' => $posts])
<h2 class="my-4">Liste des postes</h2>
<div class="table-responsive">
    <table class="table table-fit table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Contenu</th>
                <th scope="col">Activé</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Publié le</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                @if ($post->id%2 === 0)
                    <tr class="bg-transparent">
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->body, 0, 50)}}.....</td>
                        <td>{{$post->enabled ? 'Oui' : "Non"}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{date("l jS \of F Y h:i:s A", strtotime($post->published_at ))}}</td>
                        <td>
                            @if ($post->user_id == Auth::id())
                            <div class="d-flex flex-row mb-3 gap-2">
                                <div>
                                    <a href="{{url("posts/{$post->id}/edit")}}" class="btn btn-success">
                                        <span class="material-icons text-light">Modifier</span>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a type="submit" class="btn btn-danger">
                                            <span class="material-icons text-light">Supprimer</span>
                                        </a> --}}
                                        <input type="submit" value="delete" class="btn btn-danger text-light">
                                    </form>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->body, 0, 50)}}.....</td>
                        <td>{{$post->enabled ? 'Oui' : "Non"}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{date("l jS \of F Y h:i:s A", strtotime($post->published_at ))}}</td>
                        <td>
                            @if ($post->user_id == Auth::id())
                            <div class="d-flex flex-row mb-3 gap-2">
                                <div>
                                    <a href="{{url('posts/{$post->id}/edit')}}" class="btn btn-success">
                                        <span class="material-icons text-light">Modifier</span>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a type="submit" class="btn btn-danger">
                                            <span class="material-icons text-light">Supprimer</span>
                                        </a> --}}
                                        <input type="submit" value="delete" class="btn btn-danger text-light">
                                    </form>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
</div>

@endsection
