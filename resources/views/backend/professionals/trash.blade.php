@extends('backend.layouts.app')

@section('title') {{ 'Professional Trash' }} @endsection

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
                    <i class="nav-icon  fa-solid fa-professionals"></i> Professional <small class="text-muted">Deleted List</small>
                </h4>
            </div>

            <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                <button onclick="window.history.back();" class="btn btn-warning m-1 " data-toggle="tooltip" aria-label="Return Back" data-coreui-original-title="Return Back"><i class="fas fa-reply fa-fw"></i>&nbsp;</button>

                <a href='{{ route('professionals.index') }}' class="btn btn-secondary" data-toggle="tooltip" title="Professional List"><i class="fas fa-list"></i> List</a>
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
                                <th scope="col">Name</th>
                                <th scope="col">Post </th>
                                <th scope="col">Number </th>
                                <th scope="col">Email </th>
                                <th scope="col"> Image </th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professionals as $professional)
                                <tr>
                                    <td>{{ $professional->id }}</td>
                                    <td>{{ $professional->name }}</td>
                                    <td>{{ $professional->post }}</td>
                                    <td>{{ $professional->number }}</td>
                                    <td>{{ $professional->email }}</td>

                                    <td>
                                        @if ($professional->image)
                                            <img src="{{ asset('public/images/' . $professional->image) }}"
                                                alt="{{ $professional->image }}" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>

                                    <td class="text-end">
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-confirm-{{ $professional->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $professional->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $professional->id }}">
                                                           Confirm to delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <p class="text-start">Do you want to permanently delete: {{ $professional->name }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('professionals-delete', $professional->id) }}" method="POST" id="delete-form-{{ $professional->id }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-confirm-{{ $professional->id }}"><i class="fas fa-trash" title="Delete"></i>
                                        </button>


                                        <div class="modal fade" id="restore-confirm-{{ $professional->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $professional->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $professional->id }}">
                                                            Confirm to Restore</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-start">Do you want to restore: {{ $professional->name }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('professionals-restore', $professional->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#restore-confirm-{{ $professional->id }}" title="Restore">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $holidays->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
