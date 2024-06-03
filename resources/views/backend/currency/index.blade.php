@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('currency.create') }}"> Create currency</a>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Currency Code</th>
                                    <th scope="col">Prefix</th>
                                    <th scope="col">Suffix </th>
                                    <th scope="col">Base Conv. Rate </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencys as $currency)
                                    <tr>
                                        <td>{{ $currency->id }}</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $currency->prefix }}</td>
                                        <td>{{ $currency->suffix }}</td>
                                        <td>{{ $currency->bcr }}</td>

                                        <td>
                                            <form action="{{ route('currency.destroy', $currency->id) }}" method="Post">
                                                <a class="btn btn-primary"
                                                    href="{{ route('currency.edit', $currency->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- {!! $holidays->links() !!} --}}
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
