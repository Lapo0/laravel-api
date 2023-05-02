@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-5">
        My Proj: {{ $project['title'] }}
        @if($project->type)
            <span class="bg-primary">{{ $project->type->name }}</span>
        @endif
    </h1>
    <div class="card p-3">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-body-secondary"> {{ $project['client'] }}</h6>
            <h6 class="card-subtitle mb-2 text-body-secondary"> {{ $project['url'] }}</h6>
            <h5>
                    @forelse($project->technologies as $technology)
                        {{ $technology->name }}
                    @empty
                        -
                    @endforelse
            </h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"> {{ $project['description'] }}</h6>
            <div class="div">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to project list</a>
            </div>
        </div>
    </div>

</div>

@endsection