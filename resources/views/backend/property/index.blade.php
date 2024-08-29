@extends('backend.layouts.app')
@section('content')
<style>
    .property_search01 {
    display: flex;
    justify-content: space-between;
}
.row.mb-4.property_search02 {
    display: flex;
    justify-content: end;
    width: 50vw;
}
</style>
    <div class="card">
        <div class="card-body">

            <div class="property_search01">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('property.create') }}"> Create Property</a>
                </div>
                <div class="row mb-4 property_search02">
                    <div class="col-md-6 property_search03">
                        <form action="{{ route('property.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search properties"
                                    value="{{ request()->input('search') }}">
                                <div class="input-group-append" style="margin-left: 10px;">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Property List</th>
                                    <th scope="col"> Type of Property</th>
                                    <th scope="col"> Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propertys as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->type }}</td>
                                        <td>{{ $property->p_type }}</td>
                                        <td>{{ $property->address }}</td>
                                        <td>
                                            <form action="{{ route('property.destroy', $property->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('property.edit', $property->id) }}">Edit</a>
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
                    <div class="d-flex justify-content-end">
                        {{ $propertys->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
