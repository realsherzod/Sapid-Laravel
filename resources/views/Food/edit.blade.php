@extends('layouts.site')
@section('content')
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .form-select {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 80%;
        display: block;
    }
</style>
    <div class="row">
        <div class="col-12 text-center">
            <h1>Edit Food</h1>
            <div class="col-12 text-right mb-3">
<a class="btn btn-warning btn-sm" href="{{route('foods.index')}}">Back</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <form class="needs-validation" autocomplete="off" action="{{route('foods.update', $foods->id)}}" method="post" enctype="multipart/form-data" novalidate="">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="category_id">Select Category</label>
                            <select class="form-select"  name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Food Name</label>
                            <input id="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" name="title" required=""
                                placeholder="Enter food's title" value="{{$foods->title}}">

                            <div class="invalid-feedback">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Food Description</label>
                            <input id="description" type="text"
                                class="form-control @error('description') is-invalid @enderror" name="description" required=""
                                placeholder="Enter food's description" value="{{$foods->description}}">

                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input id="price" type="number"
                                class="form-control @error('price') is-invalid @enderror" name="price" required=""
                                placeholder="Enter food's price" value="{{$foods->price}}">

                            <div class="invalid-feedback">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" class="form-control" name="image" >
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                          </div>
                    </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
