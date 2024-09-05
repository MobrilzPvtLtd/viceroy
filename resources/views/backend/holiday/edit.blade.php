@extends('backend.layouts.app')

@section('title') {{ 'Holiday Edit' }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('holiday.index') }}" enctype="multipart/form-data">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="post" action="{{ route('holiday.update', $holiday->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $holiday->name }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="address">Address </label>
                                    <input class="form-control"  name="address" value="{{ $holiday->address }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="beds">Beds</label>
                                    <input type="text" class="form-control" name="beds" value="{{ $holiday->beds }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="bath">Bath</label>
                                    <input type="text" class="form-control"  name="bath" value="{{ $holiday->bath }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control"  name="price" value="{{ $holiday->price }}">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="p_type">Type of Property</label>
                                    <select class="form-control" name="p_type">
                                        <option value="">Select property type</option>
                                        <option value="premium" {{ $holiday->p_type === 'premium' ? 'selected' : '' }}>Premium</option>
                                        <option value="budget" {{ $holiday->p_type === 'budget' ? 'selected' : '' }}>Budget</option>
                                        <option value="standard" {{ $holiday->p_type === 'standard' ? 'selected' : '' }}>Standard</option>
                                    </select>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Area</label>
                                    <input type="text" class="form-control" id="city" name="area" value="{{ $holiday->area }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $holiday->url }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="featured">Featured</label>
                                    <input type="checkbox" name="featured" value="1"
                                        {{ $holiday->featured ? 'checked' : '' }}>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Property Images</label>
                                    <input type="file" class="form-control" name="image[]" multiple value="">
                                    <div>
                                        @if (!empty($holiday->image))
                                            @foreach (json_decode($holiday->image) as $image)
                                                <div class="image-thumbnail" style="display: inline-block; margin-right: 10px;">
                                                    <img src="{{ asset('public/uploads/' . $image) }}" alt="Image" style="width: 100px; height: auto;">
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No images available</p>
                                        @endif
                                    </div>
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
