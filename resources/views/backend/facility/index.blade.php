@extends('backend.layouts.app')

@section('title') {{ 'Facility List' }} @endsection

@section('content')
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
                        <i class="nav-icon fa-solid fa-font-awesome"></i> Facility <small class="text-muted">List</small>
                    </h4>
                </div>

                <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                    <a class="btn btn-success" data-toggle="tooltip" href="{{ route('facility.create') }}" aria-label="Create User" data-coreui-original-title="Create Facility">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-coreui-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('facility-trash') }}">
                                    <i class="fas fa-eye-slash"></i> View trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Facilities Name</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facilitiesy as $facility)
                                    <tr>
                                        <td>{{ $facility->id }}</td>
                                        <td>{{ $facility->name }}</td>

                                        <td class="text-end">
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete-confirm-{{ $facility->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel-{{ $facility->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel-{{ $facility->id }}">
                                                               Confirm to delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <p class="text-start">Do you want to delete: {{ $facility->name }} ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('facility.destroy', $facility->id) }}" method="POST" id="delete-form-{{ $facility->id }}">
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
                                                href="{{ route('facility.edit', $facility->id) }}">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $facility->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        <!-- Any additional content you want to add -->
                    </div>
                </div>
                <div class="col-5">
                    <div class="float-end">
                        <!-- Any additional content you want to add -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
