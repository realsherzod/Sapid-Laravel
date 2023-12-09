@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
 @include('layouts.message')
            <h1>Food Table</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-success btn-sm" href="{{ route('foods.create') }}">Create</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Food name</th>
                                        <th>Food image</th>
                                        <th>Food description</th>
                                        <th>Food price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($foods as $food)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $food->title }}</td>
                                            <td>
                                                <img height="70px" width="70px" alt="image" src="{{ asset('/storage/' . $food->image) }}" width="50">
                                            </td>
                                            <td>{{ $food->description }}</td>
                                            <td>{{ $food->price }}</td>
                                            <td class="d-flex justify-content-center align-items-center ">
                                                <a href="{{ route('foods.show', $food->id) }}"><button class="btn btn-primary btn-sm mx-2">Show</button></a>
                                                <a href="{{ route('foods.edit', $food->id) }}"><button class="btn btn-warning btn-sm mx-2">Edit</button></a>
                                                
                                                <form action="{{ route('foods.destroy', $food->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this food?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2">Delete</button>
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
