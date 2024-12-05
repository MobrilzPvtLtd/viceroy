@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('rent.index') }}" enctype="multipart/form-data">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="post" action="{{ route('rent.update', $rent->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $rent->name }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="ct_name">Address </label>
                                    <input class="form-control"  name="address" value="{{ $rent->address }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Beds</label>
                                    <input type="text" class="form-control" name="beds" value="{{ $rent->beds }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bath</label>
                                    <input type="text" class="form-control"  name="bath" value="{{ $rent->bath }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">price</label>
                                    <input type="text" class="form-control"  name="price" value="{{ $rent->price }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="p_type">Type of Property</label>
                                    <select class="form-control" name="p_type">
                                        <option value="">Select Property Type</option>
                                        <option value="premium" {{ $rent->p_type === 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="budget" {{ $rent->p_type === 'budget' ? 'selected' : '' }}>Budget</option>
                                        <option value="standard" {{ $rent->p_type === 'standard' ? 'selected' : '' }}>Standard</option>
                                    </select>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Area</label>
                                    <input type="text" class="form-control" id="city" name="area" value="{{ $rent->area }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">URL</label>
                                    <input type="text" class="form-control" id="city" name="url" value="{{ $rent->url }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Property Images</label>
                                    <input type="file" class="form-control" name="image[]" multiple value="{{ $rent->image }}">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-left">

                    </div>
                </div>
                <div class="col-5">
                    <div class="float-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
