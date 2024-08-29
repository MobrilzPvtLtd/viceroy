@extends('backend.layouts.app')
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
                                                        Do you want to delete: {{ $currency->code }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('currency.destroy', $currency->id) }}" method="POST" id="delete-form-{{ $currency->id }}">
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
                                        <a class="btn btn-primary"
                                            href="{{ route('currency.edit', $currency->id) }}">Edit</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-confirm-{{ $currency->id }}">Delete</button>
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
