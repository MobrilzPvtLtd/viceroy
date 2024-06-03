@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('rent.create') }}"> Create Rent</a>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Beds </th>
                                    <th scope="col">Bath</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Type of Property</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Property Images</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{ $rent->id }}</td>
                                    <td>{{ $rent->name }}</td>
                                    <td>{{ $rent->address }}</td>
                                    <td>{{ $rent->beds }}</td>
                                    <td>{{ $rent->bath }}</td>
                                    <td>{{ $rent->price }}</td>
                                    <td>{{ $rent->p_type }}</td>
                                    <td>{{ $rent->area }}</td>

                                    <td>
                                        @php
                                            $images = json_decode($rent->image);
                                        @endphp
                                        @foreach ($images as $image)
                                            <img src="{{ asset('public/uploads/' . trim($image)) }}" alt="Image"
                                                style="width: 100% ">
                                        @endforeach
                                    </td>
                                    <td>{{ $rent->url }}</td>

                                    <td>
                                        <form action="{{ route('rent.destroy', $rent->id) }}" method="Post">
                                            <a class="btn btn-primary"
                                                href="{{ route('rent.edit', $rent->id) }}">Edit</a>
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
