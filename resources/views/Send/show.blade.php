@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.completed_orders')</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('completeds.index') }}">@lang('words.back')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>@lang('words.order_name')</th>
                                        <th>@lang('words.food_price')</th>
                                        <th>@lang('words.email')</th>
                                        <th>@lang('words.address')</th>
                                        <th>@lang('words.phone')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $send->name }}</td>
                                        <td>{{ $send->price }} @lang('words.sum')</td>
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
                                            <th>@lang('words.show_order')</th>
                                            <th>@lang('words.quantity')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>@foreach ($products as $product)
                                                
                                                <h1 style="font-size: 16px">{{$product['title_' . \App::getLocale()]}}</h1>
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
