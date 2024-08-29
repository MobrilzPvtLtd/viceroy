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
                <a class="btn btn-success" href="{{ route('city.create') }}"> Create City</a>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Country Name</th>
                                    <th scope="col">State Name</th>
                                    <th scope="col">City Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citys as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->co_name }}</td>
                                        <td>{{ $city->st_name }}</td>
                                        <td>{{ $city->ct_name }}</td>
                                        <td>
                                            <form action="{{ route('city.destroy', $city->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('city.edit', $city->id) }}">Edit</a>
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
