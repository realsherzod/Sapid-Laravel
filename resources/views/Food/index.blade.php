@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
 @include('layouts.message')
            <h1>@lang('words.foods')</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-success btn-sm" href="{{ route('foods.create') }}">@lang('words.create')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>@lang('words.food_name')</th>
                                        <th>@lang('words.food_image')</th>
                                        <th>@lang('words.food_price')</th>
                                        <th>@lang('words.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($foods as $food)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $food['title_' . \App::getLocale()] }}</td>
                                            <td>
                                                <img height="70px" width="70px" alt="image" src="{{ asset('/storage/' . $food->image) }}" width="50">
                                            </td>
                                            <td>{{ $food->price }} @lang('words.sum')</td>
                                            <td class="d-flex justify-content-center align-items-center ">
                                                <a href="{{ route('foods.show', $food->id) }}"><button class="btn btn-primary btn-sm mx-2">@lang('words.show')</button></a>
                                                <a href="{{ route('foods.edit', $food->id) }}"><button class="btn btn-warning btn-sm mx-2">@lang('words.edit')</button></a>
                                                
                                                <form action="{{ route('foods.destroy', $food->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this food?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2">@lang('words.delete')</button>
                                                </form>
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
