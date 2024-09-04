@extends ('backend.layouts.app')

@section('title') {{ 'Country Create' }} @endsection

@section('content')
<div class="card">
    <div class="card-body">

        <div class="pull-right mb-2">
            <a class="btn btn-light" href="{{ route('country.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="container mt-5">

                    <form method="POST" action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Country Name</label>
                            <input type="text" class="form-control"value="{{ old('co_name') }}" name="co_name" placeholder="">
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


