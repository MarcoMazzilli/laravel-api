@extends('layouts.app')


@section('content')

<div class="container-fluid p-5 overflow-auto">
    <h1 class="mb-3">Edit project</h1>

    @if ($errors->any())
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)

                <li class="nav-item list-unstyled">{{ $error }} </li>

            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.project.update' , $project)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="project_name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control @error('project_name') is-invalid @enderror"
                id="project_name"
                name="project_name"
                placeholder="Insert project's name"
                value="{{old('project_name', $project->project_name)}}">
        </div>

        <div class="mb-3">
            <label for="Technologies" class="form-label d-block">Technologies</label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                @forelse ( $technologies as $technology )

                <input
                    type="checkbox"
                    class="btn-check"
                    id="tech{{ $technology->id }}"
                    autocomplete="off"
                    value="{{ $technology->id }}"
                    name="technologies[]"
                    @if (!$errors->any() && $project->technologies->contains($technology))
                        checked
                    @elseif ($errors->any() && in_array($technology->id, old('technologies', [])))
                        checked
                    @endif>
                <label class="btn btn-outline-primary" for="tech{{ $technology->id }}">{{ $technology->name }}</label>

                @empty
                    <span>No technologies avaible to add</span>
                @endforelse

            </div>
        </div>

        <div class="mb-3 w-25">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                <option value="" selected>Seleziona la tipologia del progetto</option>

                @foreach ($types as $type )
                <option value="{{ $type->id }}" {{ old('type_id', $project->type->id) == $type->id ? 'selected' : '' }}>
                    {{ $type?->name}}
                </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input
                type="text"
                class="form-control @error('url') is-invalid @enderror"
                id="url"
                name="url"
                placeholder="Insert project's url"
                value="{{old('url', $project->url)}}">
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Path image</label>
            <input
                type="file"
                class="form-control"
                id="image_path"
                name="image_path">
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="description" class="form-label">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control @error('description') is-invalid @enderror"
                cols="30"
                rows="5"
                placeholder="Insert project's description">{{old('description',$project->description)}}</textarea>
        </div>

        @if ($errors->any())
            <div class="alert alert-warning">
                <p>Ricompila "Stato" e "Licenza"</p>
            </div>
        @endif

        <div class="mb-3 w-25">
            <label for="status" class="form-label">Status</label>
            <select class="form-select"  name="status" id="status">

                <option selected value="end">End</option>
                <option value="in-progress">In progress</option>

            </select>
        </div>

        <div class="mb-3 w-25">
            <label for="license" class="form-label">License</label>
            <select class="form-select" name="license" id="license">

                <option selected value="undefined">Undefined</option>
                <option value="mit">M.I.T</option>
                <option value="eula">EULA</option>
                <option value="open">OPEN SOURCE</option>

            </select>
        </div>



        <div class="cta text-end py-3">
            <a href="{{ route('admin.project.index') }}" class="btn btn-danger">Back to home</a>
            <button type="submit" class="btn btn-warning text-white">Confirm edit</button>
        </div>

    </form>
</div>

@endsection
