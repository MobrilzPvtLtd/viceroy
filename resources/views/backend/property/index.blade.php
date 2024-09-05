@extends('backend.layouts.app')

@section('title') {{ 'Property List' }} @endsection

@section('content')
    <style>
        .property_search01 {
            display: flex;
            justify-content: space-between;
        }

        .row.mb-4.property_search02 {
            display: flex;
            justify-content: end;
            width: 50vw;
        }
    </style>
    <div class="card">
        <div class="card-body">
            {{-- Display flash messages --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h4 class="card-title mb-0">
                        <i class="nav-icon fa-solid fa-store"></i> Property <small class="text-muted">List</small>
                    </h4>
                </div>

                <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                    <a class="btn btn-success" data-toggle="tooltip" href="{{ route('property.create') }}" aria-label="Create User" data-coreui-original-title="Create Property">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-coreui-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('property-trash') }}">
                                    <i class="fas fa-eye-slash"></i> View trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mt-4">
                <form action="{{ route('property.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search properties" value="{{ request()->input('search') }}">
                        <div class="input-group-append" style="margin-left: 10px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <div class="col mt-3">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Property List</th>
                                    <th scope="col"> Type of Property</th>
                                    <th scope="col"> Address</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propertys as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->type }}</td>
                                        <td>{{ $property->p_type }}</td>
                                        <td>{{ $property->address }}</td>

                                        <td class="text-end">
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete-confirm-{{ $property->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel-{{ $property->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel-{{ $property->id }}">
                                                               Confirm to delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <p class="text-start">Do you want to delete: {{ $property->title }} ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('property.destroy', $property->id) }}" method="POST" id="delete-form-{{ $property->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('property.edit', $property->id) }}">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $property->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $propertys->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
