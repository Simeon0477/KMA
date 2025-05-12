@extends('layout.app')
@section('title', "Edit Post")
@section('content')
<div class="row justify-content-md-center py-3 py-md-5">
    <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm bg-transparent">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h3">Modifier un poste</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('posts.update', $post->id)}}" method="POST" class="bg-transparent p-4 border border-secondary rounded">
                @csrf
                @method("PUT")
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <label for="title" class="form-label">Titre </label>
                        <input type="text" class="form-control bg-tertiary" name="title" id="title" placeholder="Enter Title"
                            value="{{$post->body}}" required />
                    </div>
                    <div class="col-12">
                        <label for="body" class="form-label">Contenu </label>
                        <div class="form-floating">
                            <textarea class="form-control bg-tertiary" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" name="body">{{$post->body}}</textarea>
                            <label for="floatingTextarea2">Editer le contenu du post</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="enabledSelect" class="form-label">Activé</label>
                        <select id="enabledSelect" class="form-select bg-tertiary" name="enabled">
                            {{$post->enabled}}
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Modifier le poste" class="col-12 btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection