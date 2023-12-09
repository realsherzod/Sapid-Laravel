@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>Create New Category</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('categories.index') }}">Back</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <form class="needs-validation" autocomplete="off" action="{{ route('categories.store') }}" method="post"
                        enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required=""
                                    placeholder="Enter category's name" value="{{ old('name') }}">

                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @else
                                        What's Category name?
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
