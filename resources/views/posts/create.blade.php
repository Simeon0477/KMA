@extends('layout.app')
@section('title', "Create Post")
@section('content')
<div class="row justify-content-md-center py-3 py-md-5">
    <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="p-4 p-md-5 rounded shadow-sm bg-transparent">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h3">Créer un poste</h2>
                    </div>
                </div>
            </div>
            {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
            @endif --}}
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="bg-transparent p-4 border border-secondary rounded">
                @csrf
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control bg-tertiary" name="title" id="title" placeholder="Entrer un titre"
                            value="{{old('title')}}" required />
                        @error('title')
                        @include('includes.toast', ['msg' => 'Le titre doit contenir moins de 50 caractères', 'toastType' =>
                        'primary'])
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="fileUpload" class="form-label">Image de l'article </label>
                        <input type="file" class="form-control bg-tertiary" name="image" id="fileUpload" placeholder="Upload File"
                            value="{{old('image')}}" />
                    </div>
                    <div class="col-12">
                        <label for="photoUpload" class="form-label">Image de couverture</label>
                        <input type="file" class="form-control bg-tertiary" name="thumbImage" id="photoUpload"
                            placeholder="Upload imgae" value="{{old('thumbImage')}}" required/>
                    </div>
                    <div class="col-12">
                        <label for="body" class="form-label">Contenu</label>
                        <div class="form-floating">
                            <textarea class="form-control bg-tertiary" placeholder="Write Post Body here" id="floatingTextarea2"
                                style="height: 100px" name="body">{{old('body')}}</textarea>
                            <label for="floatingTextarea2"></label>
                        </div>
                    </div>
                    <div class="col-12 hidden">
                        <label for="enabledSelect" class="form-label">Activé</label>
                        <select id="enabledSelect" name="enabled" class="form-select bg-tertiary" required>
                            {{old('enabled')}}
                            <option value="1" selected>Choisir 0 ou 1</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-12" style="width: 100%;">
                        <input type="submit" value="Ajouter le poste" class="col-12 btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection