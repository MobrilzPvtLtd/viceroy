@extends ('backend.layouts.app')

@section('title') {{ 'Currency Create' }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-light" href="{{ route('currency.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="POST" action="{{ route('currency.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Currency Code</label>
                                    <input type="text" class="form-control" value="{{ old('code') }}" name="code" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="ct_name">Prefix </label>
                                    <input type="text" class="form-control" value="{{ old('prefix') }}"  name="prefix" placeholder="">
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Suffix </label>
                                    <input type="text" class="form-control" value="{{ old('suffix') }}" name="suffix" placeholder="">
                                </div>

                                <input type="hidden" class="form-control" value="0.00"  name="bcr">
                                {{-- <div class="form-group mb-2 col-4">
                                    <label for="city">Base Conv. Rate</label>
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

@endsection
