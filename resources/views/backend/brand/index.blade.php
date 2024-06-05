@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('brand.create') }}"> Create Brand</a>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Brand Image </th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>
                                            @if ($brand->image)
                                                <img src="{{ asset('public/images/' . $brand->image) }}" alt="{{ $brand->image }}"
                                                    width="100">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('brand.destroy', $brand->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('brand.edit', $brand->id) }}">Edit</a>
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
