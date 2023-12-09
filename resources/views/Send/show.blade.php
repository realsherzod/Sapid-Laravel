@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Show Order</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('sends.index') }}">Back</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>All price</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $send->name }}</td>
                                        <td>{{ $send->price }}</td>
                                        <td>{{ $send->email }}</td>
                                        <td>{{ $send->address }}</td>
                                        <td>{{ $send->phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>
                               
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Food</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>@foreach ($products as $product)
                                                <h1 style="font-size: 16px">{{$product['title']}}</h1>
                                            @endforeach
                                            </td>
                                            <td>@foreach ($products as $product)
                                                <h1 style="font-size: 16px">{{$product['quantity']}}</h1>
                                            @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                       
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
