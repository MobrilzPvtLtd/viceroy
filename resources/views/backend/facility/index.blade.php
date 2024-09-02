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
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('facility.create') }}"> Create Facilities</a>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Facilities Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facilitiesy as $facility)
                                    <tr>
                                        <td>{{ $facility->id }}</td>
                                        <td>{{ $facility->name }}</td>

                                        <td>
                                            <form action="{{ route('facility.destroy', $facility->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('facility.edit', $facility->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
