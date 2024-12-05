@extends('backend.layouts.app')

@section('title')
    @lang('Property Enquiry')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Date</th>
                                    {{-- <th scope="col">Start Time</th> --}}
                                    {{-- <th scope="col">End Time</th> --}}
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkouts as $checkout)
                                    @php
                                        $titlesArray = json_decode($checkout->title, true);
                                    @endphp
                                    <tr>
                                        <td>{{ $checkout->id }}</td>
                                        <td>
                                            @if (is_array($titlesArray))
                                                @foreach ($titlesArray as $title)
                                                    {{ $title }}<br>
                                                @endforeach
                                            @else
                                                {{$checkout->title}}
                                            @endif
                                        </td>
                                        <td>{{ $checkout->name }}</td>
                                        <td>{{ $checkout->email }}</td>
                                        <td>{{ $checkout->number }}</td>
                                        <td>{{ $checkout->date }}</td>
                                        {{-- <td>{{ $checkout->st_time }}</td> --}}
                                        {{-- <td>{{ $checkout->en_time }}</td> --}}

                                        <td>
                                            <button class="{{ $checkout->status == 'open' ? 'btn btn-success' : 'btn btn-danger' }} btn-sm text-white" style="cursor: auto;">{{ $checkout->status == 'open' ? 'Open' : 'Close' }}</button>
                                        </td>

                                        <td class="text-end">
                                            <a class="btn btn-primary btn-sm" href="{{ route('inquairy.show', $checkout->id) }}">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
