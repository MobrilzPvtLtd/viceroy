@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('professionals.create') }}"> Create Brand</a>
            </div>
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


                                    <th scope="col">Action</th>
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
                                        <td>
                                            <form action="{{ route('professionals.destroy', $professional->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('professionals.edit', $professional->id) }}">Edit</a>
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
