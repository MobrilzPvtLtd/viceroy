@extends ('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('professionals.index') }}">Brand</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">

                        <form method="POST" action="{{ route('professionals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Name</label>
                                    <input type="text" class="form-control" name="name"  value="" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Post</label>
                                    <input type="text" class="form-control" name="post"  value="" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Phone</label>
                                    <input type="text" class="form-control" name="number"  value="" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Email</label>
                                    <input type="email" class="form-control" name="email"  value="" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Professional Image</label>
                                    <input type="file" class="form-control" name="image"  value="" placeholder="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
