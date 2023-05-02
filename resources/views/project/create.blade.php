@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-5">
        NUOVO Project
    </h1>

    <form class="row g-3" action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="col-12">
            <label for="client" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-12">
            <label for="client" class="form-label">client</label>
            <input type="text" class="form-control" id="client" name="client" value="{{ old('client') }}">
        </div>
        @error('client')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="col-12">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
        </div>
        @error('url')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="type-id" class="form-label">Categoria</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type-id" name="type_id" aria-label="Default select example">
            <option value="" selected>Seleziona categoria</option>
            @foreach ($types as $type)
                <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
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
                        @checked(in_array($technology->id, old('technologies',[]))) 
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
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save new Project</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{-- $error->all() ci restituisce un array/collection, che cicla --}}
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

@endsection