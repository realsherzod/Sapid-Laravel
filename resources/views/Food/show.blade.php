@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.foods')</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('foods.index') }}">@lang('words.back')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>@lang('words.food_name')</th>
                                        <th>@lang('words.food_category')</th>
                                        <th>@lang('words.food_image')</th>
                                        <th>@lang('words.food_description')</th>
                                        <th>@lang('words.food_price')</th>
                                        <th>@lang('words.date')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $food['title_' . \App::getLocale()] }}</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($food->category_id == $category->id)
                                                {{ $category['name_' . \App::getLocale()] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <img width="100" height="70" src="{{ asset('/storage/' . $food->image) }}" alt="">
                                        </td>
                                        <td>{{ $food['description_' . \App::getLocale()] }}</td>
                                        <td>{{ $food->price }}</td>
                                        <td>{{ $food->created_at }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
