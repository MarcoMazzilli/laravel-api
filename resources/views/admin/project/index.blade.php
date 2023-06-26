@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 overflow-auto">

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="d-flex justify-content-end px-5">
        <div>
            {{ $projects->links() }}
        </div>
        <div>
            <a class="btn btn-primary mx-3" href="{{ route('admin.project.create')}}"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <a href="{{ route('admin.orderBy', ['direction' => $direction] ) }}"
                        class="text-black d-flex align-items-center gap-1 text-decoration-none">

                        @if ($direction === 'asc')
                        <i class="fa-solid fa-arrow-up"></i>
                        @else
                        <i class="fa-solid fa-arrow-down"></i>
                        @endif
                        <span>Id</span>

                    </a>
                </th>
                <th scope="col" class="col col-4">project_name</th>
                <th scope="col">Technology</th>
                <th scope="col">Url</th>
                <th scope="col">status</th>
                <th scope="col">license</th>
                <th scope="col">type</th>
                <th scope="col">cta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project )

            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->project_name }}</td>
                <td class="w-25">

                    @forelse ($project->technologies as $technology )
                    <span class="badge text-bg-success">{{ $technology->name }}</span>
                    @empty
                    <span class="badge text-bg-danger">No Technology</span>
                    @endforelse

                </td>
                <td>{{ $project->url }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->license }}</td>
                <td>{{ $project->type?->name ?? 'undefined' }}</td>
                <td>
                    <a href="{{ route('admin.project.show', $project) }}" class="btn btn-success">View</a>
                    <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning text-white">Edit</a>
                    {{-- form --}}
                    @include('admin.partials.delete-modal')
                    {{-- form --}}
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end px-5">
        <div>
            {{ $projects->links() }}
        </div>
    </div>

</div>
    @endsection
