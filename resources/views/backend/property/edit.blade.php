@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('property.index') }}" enctype="multipart/form-data">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="post" action="{{ route('property.update', $property->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group mb-3 col-4">
                                    <label for="">Property List</label>
                                    <select class="form-control" name="type" value="">
                                        <option value="{{ $property->type }} ">{{ $property->type }} </option>
                                        <option value="rent"> Rent </option>
                                        <option value="buy"> Buy</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $property->title }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="exampleInputEmail1">Country Name</label>
                                    <select class="form-control" id="co_name" name="country_id" required>
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == $property->country_id ? 'selected' : '' }}>
                                                {{ $country->co_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-3">
                                    <label>State</label>
                                    <select class="form-control" name="state_id" id="st_name" required>
                                        <option value="" disabled selected>Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $state->id == $property->state_id ? 'selected' : '' }}>
                                                {{ $state->st_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-3">
                                    <label>City</label>
                                    <select class="form-control" name="city_id" id="city" required>
                                        <option value="" disabled selected>Select City</option>
                                        @foreach ($citys as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $city->id == $property->city_id ? 'selected' : '' }}>
                                                {{ $city->ct_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-6">
                                    <label for="ct_name">Full Address </label>
                                    <input class="form-control" name="address" value="{{ $property->address }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">Bed Rooms</label>
                                    <input type="text" class="form-control" id="city" name="bed"
                                        value="{{ $property->bed }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Hall</label>
                                    <input type="text" class="form-control" name="hall" value="{{ $property->hall }}"
                                        placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Kitchen</label>
                                    <input type="text" class="form-control" name="kichen"
                                        value="{{ $property->kichen }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Dining</label>
                                    <input type="text" class="form-control" name="dining"
                                        value="{{ $property->dining }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">Bath Rooms</label>
                                    <input type="text" class="form-control" id="city" name="number_bathroom"
                                        value="{{ $property->number_bathroom }}" placeholder="">
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Total Rooms</label>
                                    <input type="text" class="form-control" id="city" name="number_of_room"
                                        value="{{ $property->number_of_room }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">price</label>
                                    <input type="text" class="form-control" id="city" name="price"
                                        value="{{ $property->price }}" placeholder="">
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label>Type of Property</label>
                                    <select class="form-control" name="p_type" value="">
                                        <option value="{{ $property->p_type }}">{{ $property->p_type }}</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Plot">Plot</option>
                                        <option value="Unique">Unique</option>
                                        <option value="Bungalows">Bungalows</option>
                                        <option value="Flats">Flats</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city">Area</label>
                                    <div class="d-flex">
                                        <input type="number" value="{{ $property->area }}" class="form-control"
                                            name="area" placeholder="">
                                        <select class="form-control" value="" name="size">
                                            <option value="{{ $property->size }}">{{ $property->size }}</option>
                                            <option value="Sq fit">Sq fit</option>
                                            <option value="Sq meter">Sq meter</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="image">Property Images</label>
                                    <input type="file" class="form-control" name="image[]" value="" multiple>
                                    @if (!empty($property->image) && is_array($property->image))
                                        <div class="form-group mb-3 col-12">
                                            <label>Existing Images:</label>
                                            <div class="row">
                                                @foreach ($property->image as $image)
                                                    <div class="col-md-2">
                                                        <img src="{{ asset('public/' . $image) }}" alt="Property Image"
                                                            class="img-thumbnail" style="width: 100px; height: auto;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3 col-4">
                                    <label for="city">Property Video</label>
                                    <input type="text" class="form-control" name="video"
                                        value="{{ $property->video }}">
                                </div>
                                {{-- <div class="form-group mb-3 col-4">
                                    <label for="city">Map</label>
                                    <input type="text" class="form-control" name="map"
                                        value="{{ $property->map }}">
                                </div> --}}
                                <div class="form-group mb-3 col-4">
                                    <label for="floor_plan">Floor Plan</label>
                                    <input type="file" class="form-control" name="floor_plan[]" multiple>
                                    @php
                                        // Check if $property->floor_plan is serialized
                                        $floorPlans = is_string($property->floor_plan)
                                            ? unserialize($property->floor_plan)
                                            : $property->floor_plan;
                                    @endphp

                                    @if (!empty($floorPlans) && is_array($floorPlans))
                                        <div class="form-group mb-3 col-12">
                                            <label>Existing Floor Plans:</label>
                                            <div class="row">
                                                @foreach ($floorPlans as $floor_plan)
                                                    <div class="col-md-2">
                                                        <img src="{{ asset('public/' . $floor_plan) }}"
                                                            alt="Property Floor Plan" class="img-thumbnail"
                                                            style="width: 100px; height: auto;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <p>No floor plans available</p>
                                    @endif
                                </div>

                                <div class="form-group mb-3 col-6">
                                    <label for="city">Description</label>
                                    <textarea type="text" class="form-control" name="desc" placeholder="">{{ $property->desc }}</textarea>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <label for="city"> Originating Year</label>
                                    <input type="text" class="form-control" name="year"
                                        value="{{ $property->area }}"placeholder="">
                                </div>
                                {{-- <div class="form-group mb-3 col-4">
                                    <label for="city">Slag</label>
                                    <input type="text" class="form-control" name="slag"
                                        value="{{ $property->slag }}"placeholder="">
                                </div> --}}
                                <input type="hidden" class="form-control" name="long" value="{{ $property->longitude }}" placeholder="" disabled>

                                <input type="hidden" class="form-control" name="lati" value="{{ $property->latitude }}" placeholder="" disabled>

                                <div class="form-group mb-3 col-2">
                                    <label for="featured">Featured</label>
                                    <input type="checkbox" name="featured"style="margin-top:40px" value="1"
                                        {{ $property->featured ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facilities">Facilities:</label><br>
                                <div class="row">
                                    @foreach ($facilities as $facility)
                                        <div class="col-md-6">
                                            <input type="checkbox" id="{{ $facility->id }}" name="facilities[]"
                                                value="{{ $facility->id }}"
                                                {{ in_array($facility->id, $selectedFacilities) ? 'checked' : '' }}>
                                            <label for="{{ $facility->id }}">{{ $facility->name }}</label><br>
                                        </div>
                                    @endforeach
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
