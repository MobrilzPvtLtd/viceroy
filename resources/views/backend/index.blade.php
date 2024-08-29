

@extends('backend.layouts.app')

@section('title')
    @lang('Dashboard')
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs />
@endsection

@section('style')
    <style>
        .card {
            border: none;
            margin-bottom: 24px;
            -webkit-box-shadow: 0 0 13px 0 rgba(236, 236, 241, .44);
            box-shadow: 0 0 13px 0 rgba(236, 236, 241, .44);
            min-height: 150px; /* Ensures all cards have the same minimum height */
        }

        .avatar-xs {
            height: 2.3rem;
            width: 2.3rem;
        }
    </style>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <x-backend.section-header>
                @lang('Admin Dashboard')

                <x-slot name="toolbar">
                    <button class="btn btn-outline-primary mb-1" type="button" data-toggle="tooltip"
                        data-coreui-placement="top" title="Tooltip">
                        <i class="fa-solid fa-bullhorn"></i>
                    </button>
                </x-slot>
            </x-backend.section-header>

            <div class="row py-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-info">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa-solid fa-house" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-info">{{ $propertys }}</h3>
                        <p class="text-muted mb-0">Total Buy Property</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa-solid fa-house ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $rentCount }}</h3>
                            <p class="text-muted mb-0">Total Rent Property</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-success">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa-solid  fa-house ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-success">{{ $holidayCount }}</h3>
                        <p class="text-muted mb-0">Total Holiday Rental</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-warning">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-cab ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-warning">{{$contacts}}</h3>
                            <p class="text-muted mb-0">Total Contact Inquiry</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-info">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-ship ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-info">{{$checkouts}}</h3>
                        <p class="text-muted mb-0">Total Property Inquiry</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-home ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $properties }}</h3>
                        <p class="text-muted mb-0">Total Property</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-danger">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-users ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-danger">{{ $completeContracts ?? '-' }}</h3>
                            <p class="text-muted mb-0">Complete Property</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card radius-10 border-start border-end border-top border-bottom border-0 border-1 border-success">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fab fa-first-order ml-3" style="font-size: 20px"></i>
                            </div>
                            <h3 class="font-size-20 mt-0 pt-1 text-success">{{ $completedContracts ?? '-' }}</h3>
                            <p class="text-muted mb-0">Property</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
