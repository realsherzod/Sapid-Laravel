@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Show Food</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('foods.index') }}">Back</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Food Name</th>
                                        <th>Food Category</th>
                                        <th>Food image</th>
                                        <th>Food description</th>
                                        <th>Food price</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $food->title }}</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($food->category_id == $category->id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <img width="100" height="70" src="{{ asset('/storage/' . $food->image) }}" alt="">
                                        </td>
                                        <td>{{ $food->description }}</td>
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
