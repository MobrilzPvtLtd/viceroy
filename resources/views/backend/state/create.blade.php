@extends ('backend.layouts.app')



@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pull-right mb-2">
                <a class="btn btn-light" href="{{ route('state.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">

                        <form method="POST" action="{{ route('state.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="exampleInputEmail1">Country Name</label>
                                    <select class="form-control" name="co_name"  value="{{ old('co_name') }}"required focus>
                                        <option value="" disabled selected> select Country</option>
                                        @foreach ($countries as $country)
                                            {{-- <input type="text" class="form-control" name="co_name" placeholder=""> --}}
                                            <option value="{{ $country->id }}">{{ $country->co_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="">State Name</label>
                                    <input type="text" class="form-control" name="st_name" value="{{ old('st_name') }}" placeholder="">
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
