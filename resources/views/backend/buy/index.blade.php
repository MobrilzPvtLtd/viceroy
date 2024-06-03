@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('buy.create') }}"> Create Buy</a>
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
                                @foreach ($buys as $buy)
                                <tr>
                                    <td>{{ $buy->id }}</td>
                                    <td>{{ $buy->name }}</td>
                                    <td>{{ $buy->address }}</td>
                                    <td>{{ $buy->beds }}</td>
                                    <td>{{ $buy->bath }}</td>
                                    <td>{{ $buy->price }}</td>
                                    <td>{{ $buy->p_type }}</td>
                                    <td>{{ $buy->area }}</td>

                                    <td>
                                        @php
                                            $images = json_decode($buy->image);
                                        @endphp
                                        @foreach ($images as $image)
                                            <img src="{{ asset('public/uploads/' . trim($image)) }}" alt="Image"
                                                style="width: 100% ">
                                        @endforeach
                                    </td>
                                    <td>{{ $buy->url }}</td>

                                    <td>
                                        <form action="{{ route('buy.destroy', $buy->id) }}" method="Post">
                                            <a class="btn btn-primary"
                                                href="{{ route('buy.edit', $buy->id) }}">Edit</a>
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
