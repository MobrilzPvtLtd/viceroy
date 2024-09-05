@extends('backend.layouts.app')

@section('title')
    @lang('Property Enquiry Show')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h4 class="card-title mb-0">
                        <i class="nav-icon fa-solid fa-store"></i>
                        {{ label_case($checkout->name) }} <small class="text-muted">Property Enquiry Show</small>
                    </h4>
                </div>

                <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                    <button onclick="window.history.back();" class="btn btn-warning m-1 " data-toggle="tooltip"
                        aria-label="Return Back" data-coreui-original-title="Return Back"><i
                            class="fas fa-reply fa-fw"></i>&nbsp;</button>
                    <a href='{{ route('inquairy.index') }}' class="btn btn-secondary" data-toggle="tooltip"
                        title="Message List"><i class="fas fa-list"></i> List</a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table-bordered table-hover table">
                            <tr>
                                <th>Image</th>
                                <td><img class="user-profile-image img-fluid img-thumbnail"
                                        src="{{ asset($checkout->image) }}"
                                        style="max-height:200px; max-width:200px;" /></td>
                            </tr>

                            @php
                                $fields_array = [
                                    ['name' => 'title', 'type' => 'text'],
                                    ['name' => 'name', 'type' => 'text'],
                                    ['name' => 'email', 'type' => 'text'],
                                    ['name' => 'number', 'type' => 'text'],
                                    ['name' => 'date', 'type' => 'date'],
                                    ['name' => 'st_time', 'type' => 'time'],
                                    ['name' => 'en_time', 'type' => 'time'],
                                    ['name' => 'massage', 'type' => 'text'],
                                ];
                            @endphp

                            @foreach ($fields_array as $item)
                                @php
                                    $field_name = $item['name'];
                                @endphp
                                <tr>
                                    <th>{{ __(label_case($field_name)) }}</th>
                                    <td>{{ $checkout->$field_name }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th>{{ __('labels.backend.users.fields.status') }}</th>
                                <td>
                                    <div class="btn-group">
                                        <button class="{{ $checkout->status == 'open' ? 'btn btn-success' : 'btn btn-danger' }} dropdown-toggle text-white btn-sm" type="button" data-coreui-toggle="dropdown" aria-expanded="false">
                                            {{ $checkout->status == 'open' ? 'Open' : 'Close' }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('is_viewchackout') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="checkoutId" id="" value="{{ $checkout->id }}">
                                                    <input type="hidden" name="status" id="" value="{{ $checkout->status == 'open' ? 'close' : 'open' }}">
                                                    <button type="submit" class="dropdown-item" href="{{ route('is_view') }}">
                                                        {{ $checkout->status == 'open' ? 'Close' : 'Open' }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.users.fields.created_at') }}</th>
                                <td>{{ $checkout->created_at }}
                                    <br><small>({{ $checkout->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.users.fields.updated_at') }}</th>
                                <td>{{ $checkout->updated_at }}
                                    <br /><small>({{ $checkout->updated_at->diffForHumans() }})</small>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-7">
                        <div class="float-left">
                            <!-- Any additional content you want to add -->
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="float-end">
                            <!-- Any additional content you want to add -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
