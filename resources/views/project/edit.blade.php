@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row text-center">
            <h1>
                EDIT
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1>
                Modifica: {{ $project->title }}
            </h1>

            <form action="{{ route('projects.update', $project) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="client" class="form-label">Cliente</label>
                    <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" value="{{ old('client', $project->client) }}">
                    @error('client')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">url</label>
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $project->url) }}">
                    @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type-id" class="form-label">Categoria</label>
                    <select class="form-select @error('type_id') is-invalid @enderror" id="type-id" name="type_id" aria-label="Default select example">
                    <option value="" selected>Seleziona categoria</option>
                    @foreach ($types as $type)
                        <option @selected( old('type_id', $project->type_id) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    </select>
                    {{-- <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" aria-describedby="titleHelp"> --}}
                    {{-- errore title --}}
                    @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="technologies" class="form-label">Technology</label>
                    <div class="d-flex @error('technologies') is-invalid @enderror flex-wrap gap-5">
                    
                        @foreach($technologies as $technology)
                            <div class="form-check">
                                <input 
                                name="technologies[]" 
                                @checked(in_array($technology->id, old('technologies',$project->technologies->pluck('id')->all()))) 
                                class="form-check-input" 
                                type="checkbox" 
                                value="{{ $technology->id }}" 
                                id="flexCheckDefault"
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Salva
                </button>                            
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection