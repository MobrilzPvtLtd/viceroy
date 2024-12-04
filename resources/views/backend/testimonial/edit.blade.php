@extends('backend.layouts.app')

@section('title') {{ 'Testimonial Edit' }} @endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-light" href="{{ route('testimonial.index') }}" enctype="multipart/form-data">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="container mt-5">
                    <form method="post" action="{{ route('testimonial.update',$testimonial->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" name="company" value="{{ $testimonial->company }}">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" name="rating" value="{{ $testimonial->rating }}">
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" rows="5">{{ $testimonial->description }}</textarea>
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
