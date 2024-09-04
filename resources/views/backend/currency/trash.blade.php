@extends('backend.layouts.app')

@section('title') {{ 'Currency Trash' }} @endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

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
                    <i class="nav-icon  fa-solid fa-money-bill-1-wave"></i> Currency <small class="text-muted">Deleted List</small>
                </h4>
            </div>

            <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                <button onclick="window.history.back();" class="btn btn-warning m-1 " data-toggle="tooltip" aria-label="Return Back" data-coreui-original-title="Return Back"><i class="fas fa-reply fa-fw"></i>&nbsp;</button>

                <a href='{{ route('currency.index') }}' class="btn btn-secondary" data-toggle="tooltip" title="Currency List"><i class="fas fa-list"></i> List</a>
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
                                <th scope="col">Currency Code</th>
                                <th scope="col">Prefix</th>
                                <th scope="col">Suffix</th>
                                <th scope="col">Base Conv. Rate</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currencies as $currency)
                                <tr>
                                    <td>{{ $currency->id }}</td>
                                    <td>{{ $currency->code }}</td>
                                    <td>{{ $currency->prefix }}</td>
                                    <td>{{ $currency->suffix }}</td>
                                    <td>{{ $currency->bcr }}</td>
                                    <td class="text-end">
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-confirm-{{ $currency->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $currency->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $currency->id }}">
                                                           Confirm to delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <p class="text-start">Do you want to permanently delete: {{ $currency->code }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('currency-delete', $currency->id) }}" method="POST" id="delete-form-{{ $currency->id }}">
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
                                            data-bs-target="#delete-confirm-{{ $currency->id }}"><i class="fas fa-trash" title="Delete"></i>
                                        </button>


                                        <div class="modal fade" id="restore-confirm-{{ $currency->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel-{{ $currency->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $currency->id }}">
                                                            Confirm to delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-start">Do you want to restore: {{ $currency->code }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('currency-restore', $currency->id) }}" method="POST" style="display: inline;">
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
                                        data-bs-target="#restore-confirm-{{ $currency->id }}" data-coreui-original-title="Restore">
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
