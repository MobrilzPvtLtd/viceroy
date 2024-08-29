@extends('backend.layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
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
                                                        
                                                        <button type="button" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-confirm-{{ $currency->id }}">Delete</button>
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

</div>

@endsection

@push('scripts')
    <!-- jQuery and Bootstrap JS -->


    <script>

    </script>
@endpush