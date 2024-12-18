@extends('backend.layouts.app')

@section('title') {{ 'City Edit' }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('city.index') }}" enctype="multipart/form-data">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="post" action="{{ route('city.update', $city->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="form-group mb-2">
                            <label for="exampleInputEmail1">country Name</label>
                            <input type="text" class="form-control" name="co_name" value="{{ $city->co_name }}" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">State Name</label>
                            <input type="text" class="form-control" name="st_name " value="{{ $city->st_name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Citie Name</label>
                            <input type="text" class="form-control" name="ct_name" value="{{ $city->ct_name }}">
                        </div> --}}
                            <div class="row">
                                <div class="form-group mb-2 col-6">
                                    <label for="exampleInputEmail1">Country Name</label>
                                    <select class="form-control" id="co_name" name="co_name" required focus>
                                        <option value="" disabled selected> Select Country</option>
                                        @foreach ($country as $country)
                                            <option value="{{ $country->id }}"  @if($city->co_name == $country->id) selected @endif>{{ $country->co_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 col-6">
                                    <label for="st_name">State</label>
                                    <select class="form-control" id="state" name="st_name" required>
                                        <option value="" disabled selected> Select State</option>
                                        @foreach ($state as $st)
                                        <option value="{{ $st->id }}"
                                            @if($city->st_name == $st->id) selected @endif
                                            >{{ $st->st_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" id="state" name="st_name" placeholder=""
                                    readonly> --}}
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">City</label>
                                        <input type="text" class="form-control" name="ct_name" value="{{ $city->ct_name }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-3 col-8">
                                    <label for="address">Address/Location</label>
                                    <input class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="">
                                </div> --}}
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
    <script>
        $(document).ready(function() {
            $('#co_name').change(function() {
                var country = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-state') }}',
                    data: {
                        country: country
                    },
                    success: function(result) {
                        console.log(result);
                        $("#state").html(result);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
