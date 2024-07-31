@extends ('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('property.index') }}"> Property</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">

                        <form method="POST" action="{{ route('property.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="">Property List</label>
                                    <select class="form-control" name="type" value="{{ old('type') }}">
                                        <option value="">select property </option>
                                        <option value="rent">For Rent </option>
                                        <option value="buy">For Buy</option>

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Country Name</label>
                                    <select class="form-control" id="co_name" name="country_id"
                                        value="{{ old('country_id') }}"required focus>
                                        <option value="" disabled selected> select Country</option>
                                        @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}">{{ $country->co_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label>City</label>
                                    <select class="form-control" name="city_id" id="city" required>
                                        <option value="" disabled selected> select city</option>
                                        @foreach ($citys as $city)
                                            <option value="{{ $city->id }}">{{ $city->ct_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="">full Address </label>
                                    <textarea class="form-control" id="ct_name" name="address" value="{{ old('address') }}" placeholder=""></textarea>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bed Rooms</label>
                                    <input type="number" class="form-control" id="city" name="bed"
                                        value="{{ old('bed') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Hall</label>
                                    <input type="number" class="form-control" name="hall"
                                        value="{{ old('hall') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Kitchen</label>
                                    <input type="number" class="form-control"  name="kichen"
                                        value="{{ old('kichen') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Dining</label>
                                    <input type="number" class="form-control"  name="dining"
                                        value="{{ old('dining') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bath Rooms</label>
                                    <input type="number" class="form-control" id="city" name="number_bathroom"
                                        value="{{ old('number_bathroom') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Total Rooms</label>
                                    <input type="number" class="form-control" id="city" name="number_of_room"
                                        value="{{ old('number_of_room') }}" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Price</label>
                                    <input type="number" class="form-control" id="city" name="price"
                                        value="{{ old('price') }}" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label>Type of Property</label>
                                    <select class="form-control" name="p_type" value="">
                                        <option value="{{ old('p_type') }}">select property </option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Plot">Plot</option>
                                        <option value="Bungalows">Bungalows</option>
                                        <option value="Flats">Flats</option>

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Area</label>
                                    <div class="d-flex">
                                        <input type="number" class="form-control"  name="area"
                                        value="{{ old('size') }}" placeholder="">
                                        <select class="form-control" value="" name="size">
                                            <option value="Sq fit">Sq fit</option>
                                            <option value="Sq meter">Sq meter</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="image">Property Images</label>
                                    <input type="file" class="form-control" name="image[]"
                                        value="{{ old('image[]') }}" multiple>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label >Property Video</label>
                                    <input type="text" class="form-control" name="video"
                                        value="{{ old('video') }}">
                                </div>
                                {{-- <div class="form-group mb-2 col-4">
                                    <label for="city">Map</label>
                                    <input type="text" class="form-control" name="map"
                                        value="{{ old('map') }}">
                                </div> --}}
                                <div class="form-group mb-2 col-4">
                                    <label for="floor_plan">floor_plan</label>
                                    <input type="file" class="form-control" name="floor_plan[]" multiple>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city"> Originating Year</label>
                                    <input type="text" class="form-control" name="year"
                                        value="{{ old('year') }}"placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Discription</label>
                                    <textarea type="text" class="form-control" name="desc" value="{{ old('desc') }}"placeholder=""></textarea>
                                </div>
                                <div class="form-group mb-2 col-4" style="margin-top:40px">
                                    <label for="featured">Featured</label>
                                    <input type="checkbox" name="featured" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facilities">Facilities:</label><br>
                                <div class="row">
                                    @foreach ($facilitiesy as $facility)
                                        <div class="col-md-6">
                                            <input type="checkbox" id="{{ $facility->id }}" name="facilities[]"
                                                value="{{ $facility->id }}">
                                            <label for="{{ $facility->id }}">{{ $facility->name }}</label><br>
                                        </div>
                                    @endforeach
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
    <script>
        $(document).ready(function() {
            $('#co_name').change(function() {
                var country = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetch-city') }}',
                    data: {
                        country: country
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
