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
                                    <label for="p_type">Type of Property</label>
                                    <select class="form-control" name="type" value="{{ old('type') }}">
                                        <option value="">select property </option>
                                        <option value="rent">For Rent </option>
                                        <option value="buy">For Buy</option>
                                        {{-- <option value="budget">Budget</option>
                                        <option value="standard">Standard</option> --}}

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="ct_name">Address </label>
                                    <textarea class="form-control" id="ct_name" name="address" value="{{ old('address') }}" placeholder=""></textarea>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bed Rooms</label>
                                    <input type="text" class="form-control" id="city" name="bed"
                                        value="{{ old('bed') }}" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bath Rooms</label>
                                    <input type="text" class="form-control" id="city" name="number_bathroom"
                                        value="{{ old('number_bathroom') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">number_of_room</label>
                                    <input type="text" class="form-control" id="city" name="number_of_room"
                                        value="{{ old('number_of_room') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">price</label>
                                    <input type="text" class="form-control" id="city" name="price"
                                        value="{{ old('price') }}" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="p_type">Type of Property</label>
                                    <select class="form-control" name="p_type" value="{{ old('p_type') }}">
                                        <option value="">select property </option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Plot">Plot</option>
                                        <option value="Unique">Unique</option>
                                        <option value="Bungalows">Bungalows</option>
                                        <option value="Flats">Flats</option>

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Area</label>
                                    <input type="text" class="form-control" id="city" name="area"
                                        value="{{ old('area') }}" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="image">Property Images</label>
                                    <input type="file" class="form-control" name="image[]" value="{{ old('image[]') }}"
                                        multiple>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Property Video</label>
                                    <input type="text" class="form-control" name="video" value="{{ old('video') }}">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Map</label>
                                    <input type="text" class="form-control" name="map"
                                        value="{{ old('map') }}">
                                </div>
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
                                <div class="form-group mb-2 col-4">
                                    <label for="city">property_status</label>
                                    <select class="form-control" id="p_type" name="property_status"
                                        value="{{ old('property_status') }}">
                                        <option value="">select property </option>
                                        <option value="For Sale">For Sale </option>
                                        <option value="For Buy">For Buy</option>
                                        {{-- <option value="standard">Standard</option> --}}

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Property ID</label>
                                    <input type="text" class="form-control" name="p_id"
                                        value="{{ old('p_id') }}"placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Slug</label>
                                    <input type="text" class="form-control" name="slag"
                                        value="{{ old('slag') }}"placeholder="">
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
    {{-- <script>
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
    </script> --}}
@endsection
