@extends('backend.layouts.app')

@section('title') {{ 'Currency Edit' }} @endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('currency.index') }}" enctype="multipart/form-data">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="container mt-5">
                        <form method="post" action="{{ route('currency.update', $currency->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group mb-2 col-4">
                                    <label for="exampleInputEmail1">Currency Code</label>
                                    <input type="text" class="form-control" name="code" value="{{ $currency->code }}" >
                                </div>
                                <div class="form-group mb-2 col-4">
                                    <label for="ct_name">Prefix </label>
                                    <input class="form-control"  name="prefix" value="{{ $currency->prefix }}" >
                                </div>

                                <div class="form-group mb-2 col-4">
                                    <label for="city">Suffix</label>
                                    <input type="text" class="form-control" name="suffix" value="{{ $currency->suffix }}" >
                                </div>

                                <input type="hidden" class="form-control"  name="bcr" value="{{ $currency->bcr }}" >
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
