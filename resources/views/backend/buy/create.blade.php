@extends ('backend.layouts.app')



@section('content')
    <div class="card">
        <div class="card-body">

            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('buy.index') }}"> Buy</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">

                        <form method="POST" action="{{ route('buy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Property Name</label>
                                    <input type="text" class="form-control" id="city" name="name" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="ct_name">Address  </label>
                                    <textarea class="form-control" id="ct_name" name="address" placeholder=""></textarea>
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Beds</label>
                                    <input type="text" class="form-control" id="city" name="beds" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Bath</label>
                                    <input type="text" class="form-control" id="city" name="bath" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">price</label>
                                    <input type="text" class="form-control" id="city" name="price" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="p_type">Type of Property</label>
                                    <select class="form-control" id="p_type" name="p_type">
                                        <option value="">select property </option>
                                        <option value="premium">Premium</option>
                                        <option value="budget">Budget</option>
                                        <option value="standard">Standard</option>

                                    </select>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Area</label>
                                    <input type="text" class="form-control" id="city" name="area" placeholder="">
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Property Images</label>
                                    <input type="file" class="form-control" name="image[]" multiple>
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="city">Url</label>
                                    <input type="text" class="form-control"  name="url" placeholder="">
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
