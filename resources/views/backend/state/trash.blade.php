@extends('backend.layouts.app')

@section('title') {{ 'State Trash' }} @endsection

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
                    <i class="nav-icon  fa-solid fa-building"></i> State <small class="text-muted">Deleted List</small>
                </h4>
            </div>

            <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                <button onclick="window.history.back();" class="btn btn-warning m-1 " data-toggle="tooltip" aria-label="Return Back" data-coreui-original-title="Return Back"><i class="fas fa-reply fa-fw"></i>&nbsp;</button>

                <a href='{{ route('state.index') }}' class="btn btn-secondary" data-toggle="tooltip" title="State List"><i class="fas fa-list"></i> List</a>
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
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                                <tr>
                                    <td>{{ $state->id }}</td>
                                    <td>{{ $state->country_name }}</td>
                                    <td>{{ $state->st_name }}</td>

                                    <td class="text-end">
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-confirm-{{ $state->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $state->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $state->id }}">
                                                           Confirm to delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <p class="text-start">Do you want to permanently delete: {{ $state->st_name }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('state-delete', $state->id) }}" method="POST" id="delete-form-{{ $state->id }}">
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
                                            data-bs-target="#delete-confirm-{{ $state->id }}"><i class="fas fa-trash" title="Delete"></i>
                                        </button>


                                        <div class="modal fade" id="restore-confirm-{{ $state->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $state->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $state->id }}">
                                                            Confirm to delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-start">Do you want to restore: {{ $state->st_name }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('state-restore', $state->id) }}" method="POST" style="display: inline;">
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
                                        data-bs-target="#restore-confirm-{{ $state->id }}" data-coreui-original-title="Restore">
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