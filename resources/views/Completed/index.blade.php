@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
 @include('layouts.message')
            <h1>@lang('words.completed_orders')</h1>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>@lang('words.order_name')</th>
                                        <th>@lang('words.order_price')</th>
                                       
                                 
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sends as $send)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $send->name }}</td>
                                            <td>{{ $send->price }} @lang('words.sum')</td>
                                     
                                            <td class="d-flex justify-content-center align-items-center ">
                                                <a href="{{ route('sends.show', $send->id) }}">  <button class="btn btn-primary btn-sm mx-2">@lang('words.show')</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
