@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1>Pagina edit</h1>

    <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name') ?? $project->name}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Copertina</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image') ?? $project->image}}">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technology" class="form-label">Tecnologie usate</label>
            <input type="text" class="form-control @error('technology') is-invalid @enderror" id="technology" name="technology" value="{{old('technology') ?? $project->technology}}">
            @error('technology')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="repo_links" class="form-label">Link</label>
            <input type="text" class="form-control @error('repo_links') is-invalid @enderror" id="repo_links" name="repo_links" value="{{old('repo_links') ?? $project->repo_links}}">
            @error('repo_links')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="type_id">Tipologia</label>
            <select class="form-select" name="type_id" id="type_id">               
                <option value=""></option>

                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->title }}</option>
                @endforeach

            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection