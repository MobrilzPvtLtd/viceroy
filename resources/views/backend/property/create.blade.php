@extends ('backend.layouts.app')

@section('title')
    {{ 'Property Create' }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('property.index') }}"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">

                        <form method="POST" action="{{ route('property.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="latitude" value="{{ old('latitude') }}">
                                <input type="hidden" name="longitude" value="{{ old('longitude') }}">

                                <div class="form-group mb-3 col-4">
                                    <label for="">Property List</label>
                                    <select class="form-control" name="type" value="{{ old('type') }}">
                                        <option value="">Select Property </option>
                                        <option value="rent">For Rent </option>
                                        <option value="buy">For Buy</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="exampleInputEmail1">Country</label>
                                    <select class="form-control" id="co_name" name="country_id"
                                        value="{{ old('country_id') }}"required focus>
                                        <option value="" disabled selected> Select Country</option>
                                        @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}">{{ $country->co_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-3">
                                    <label>State</label>
                                    <select class="form-control" name="state_id" id="st_name" required>
                                        <option value="" disabled selected> Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->st_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-3">
                                    <label>City</label>
                                    <select class="form-control" name="city_id" id="city" required>
                                        <option value="" disabled selected> Select City</option>
                                        @foreach ($citys as $city)
                                            <option value="{{ $city->id }}">{{ $city->ct_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-6">
                                    <label for="">Address/Location</label>
                                    <input class="form-control" id="ct_name" name="address" value="{{ old('address') }}"
                                        placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">Bed Rooms</label>
                                    <input type="number" class="form-control" id="city" name="bed"
                                        value="{{ old('bed') }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Hall</label>
                                    <input type="number" class="form-control" name="hall" value="{{ old('hall') }}"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Kitchen</label>
                                    <input type="number" class="form-control" name="kichen" value="{{ old('kichen') }}"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Dining</label>
                                    <input type="number" class="form-control" name="dining" value="{{ old('dining') }}"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Bath Rooms</label>
                                    <input type="number" class="form-control" id="city" name="number_bathroom"
                                        value="{{ old('number_bathroom') }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Total Rooms</label>
                                    <input type="number" class="form-control" id="city" name="number_of_room"
                                        value="{{ old('number_of_room') }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">Price in (USD)</label>
                                    <input type="number" class="form-control" id="city" name="price"
                                        value="{{ old('price') }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label>Type of Property</label>
                                    <select class="form-control" name="p_type" value="">
                                        <option value="{{ old('p_type') }}">Select Property Type </option>
                                        <option value="Flats/Apartment">Flats/Apartment</option>
                                        <option value="End Terraced House">End Terraced House</option>
                                        <option value="Mid Terraced">Mid Terraced</option>
                                        <option value="Semi Detached">Semi Detached</option>
                                        <option value="Detached">Detached</option>
                                        <option value="Penthouse">Penthouse</option>
                                        <option value="Villa/Bungalow">Villa/Bungalow</option>
                                        <option value="Villa Compound">Villa Compound</option>
                                        <option value="Land">Land</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Area</label>
                                    <div class="d-flex">
                                        <input type="number" class="form-control" name="area"
                                            value="{{ old('size') }}" placeholder="">
                                        <select class="form-control" value="" name="size">
                                            <option value="Sq fit">Sq ft.</option>
                                            <option value="Sq meter">Sq meter</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="image">Property Images</label>
                                    <input type="file" class="form-control" name="image[]"
                                        value="{{ old('image[]') }}" multiple>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label>Property Video</label>
                                    <input type="text" class="form-control" name="video"
                                        value="{{ old('video') }}">
                                </div>
                                {{-- <div class="form-group mb-3 col-4">
                                    <label for="city">Map</label>
                                    <input type="text" class="form-control" name="map"
                                        value="{{ old('map') }}">
                                </div> --}}
                                <div class="form-group mb-3 col-4">
                                    <label for="floor_plan">Floor Plan</label>
                                    <input type="file" class="form-control" name="floor_plan[]" multiple>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city"> Originating Year</label>
                                    <input type="text" class="form-control" name="year"
                                        value="{{ old('year') }}"placeholder="">
                                </div>
                                <div class="form-group mb-3 col-6">
                                    <label for="city">Description</label>
                                    <textarea type="text" class="form-control" name="desc" value="{{ old('desc') }}"placeholder=""></textarea>
                                </div>
                                <div class="form-group mb-3 col-2" style="margin-top:40px">
                                    <label for="featured">Featured</label>
                                    <input type="checkbox" name="featured" value="1">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="facilities">Facilities:</label><br>
                                <div class="row">
                                    @foreach ($facilitiesy as $facility)
                                        <div class="col-md-6">
                                            <input type="checkbox" id="{{ $facility->id }}" name="facilities[]"
                                                value="{{ $facility->id }}">
                                            <label for="{{ $facility->id }}">{{ Str::ucfirst($facility->name) }}</label><br>
                                        </div>
                                    @endforeach
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
    <script>
        // $(document).ready(function() {
        //     $('#co_name').change(function() {
        //         var country = $(this).val();

        //         $.ajax({
        //             type: 'GET',
        //             url: '{{ route('fetch-city') }}',
        //             data: {
        //                 country: country
        //             },
        //             success: function(result) {
        //                 console.log(result);
        //                 $("#city").html(result);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     });
        // });
    </script>
    <script>
        $(document).ready(function() {
            $('#co_name').change(function() {
                var country = $(this).val();
                console.log(country);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-states') }}',
                    data: {
                        country: country
                    },
                    success: function(result) {
                        console.log(result);
                        $("#st_name").html(result);
                        $("#city").html('<option value="">Select City</option>');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#st_name').change(function() {
                var state = $(this).val();
                console.log(state);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-city') }}',
                    data: {
                        state: state
                    },
                    success: function(result) {
                        console.log(result);
                        $("#city").html(result);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
