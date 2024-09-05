@extends ('backend.layouts.app')

@section('title') {{ 'Facility Create' }} @endsection

@section('content')
<div class="card">
    <div class="card-body">

        <div class="pull-right mb-2">
            <a class="btn btn-light" href="{{ route('facility.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="container mt-5">

                    <form method="POST" action="{{ route('facility.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Facilities Name</label>
                            <input type="text" class="form-control"value="{{ old('name') }}" name="name" placeholder="">
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


