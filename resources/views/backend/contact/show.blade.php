@extends('backend.layouts.app')

@section('title')
    @lang('Contact Enquiry Show')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h4 class="card-title mb-0">
                        <i class="nav-icon fa-phone fa-solid"></i>
                        {{ label_case($contact->name) }} <small class="text-muted">Contact Enquiry Show</small>
                    </h4>
                </div>

                <div class="btn-toolbar d-block text-end" role="toolbar" aria-label="Toolbar with buttons">
                    <button onclick="window.history.back();" class="btn btn-warning m-1 " data-toggle="tooltip"
                        aria-label="Return Back" data-coreui-original-title="Return Back"><i
                            class="fas fa-reply fa-fw"></i>&nbsp;</button>
                    <a href='{{ route('message.index') }}' class="btn btn-secondary" data-toggle="tooltip"
                        title="Message List"><i class="fas fa-list"></i> List</a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table-bordered table-hover table">
                            @php
                                $fields_array = [
                                    ['name' => 'name', 'type' => 'text'],
                                    ['name' => 'email', 'type' => 'text'],
                                    ['name' => 'phone', 'type' => 'text'],
                                    ['name' => 'sub', 'type' => 'text'],
                                    ['name' => 'message', 'type' => 'text'],
                                ];
                            @endphp

                            @foreach ($fields_array as $item)
                                @php
                                    $field_name = $item['name'];
                                @endphp
                                <tr>
                                    <th>{{ __(label_case($field_name)) }}</th>
                                    <td>{{ $contact->$field_name }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th>{{ __('labels.backend.users.fields.status') }}</th>
                                <td>
                                    <div class="btn-group">
                                        <button class="{{ $contact->status == 'open' ? 'btn btn-success' : 'btn btn-danger' }} dropdown-toggle text-white btn-sm" type="button" data-coreui-toggle="dropdown" aria-expanded="false">
                                            {{ $contact->status == 'open' ? 'Open' : 'Close' }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('is_view') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="contactId" id="" value="{{ $contact->id }}">
                                                    <input type="hidden" name="status" id="" value="{{ $contact->status == 'open' ? 'close' : 'open' }}">
                                                    <button type="submit" class="dropdown-item" href="{{ route('is_view') }}">
                                                        {{ $contact->status == 'open' ? 'Close' : 'Open' }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.users.fields.created_at') }}</th>
                                <td>{{ $contact->created_at }}
                                    <br><small>({{ $contact->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('labels.backend.users.fields.updated_at') }}</th>
                                <td>{{ $contact->updated_at }}
                                    <br /><small>({{ $contact->updated_at->diffForHumans() }})</small>
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
