@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Display flash messages --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Create Currency Button --}}
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('currency.create') }}">Create Currency</a>
            </div>

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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencys as $currency)
                                    <tr>
                                        <td>{{ $currency->id }}</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $currency->prefix }}</td>
                                        <td>{{ $currency->suffix }}</td>
                                        <td>{{ $currency->bcr }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmDelete({{ $currency->id }})">Delete</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('currency.edit', $currency->id) }}">Edit</a>
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

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this currency?
                    </div>
                    <div class="modal-footer">
                        <form id="delete-form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            window.confirmDelete = function(id) {
                var form = document.getElementById('delete-form');
                form.action = '/currency.index' + id;
                $('#confirmationModal').modal('show');
            }
        });
    </script>
@endpush
