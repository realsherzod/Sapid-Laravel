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
            <h1>@lang('words.foods')</h1>
            <div class="col-12 text-right mb-3">
<a class="btn btn-warning btn-sm" href="{{route('foods.index')}}">@lang('words.back')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <form class="needs-validation" autocomplete="off" action="{{route('foods.update', $foods->id)}}" method="post" enctype="multipart/form-data" novalidate="">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="category_id">@lang('words.select_category')</label>
                            <select class="form-select"  name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category['name_' . \App::getLocale()] }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_uz">@lang('words.food_name')</label>
                            <input id="title_uz" type="text"
                                class="form-control @error('title_uz') is-invalid @enderror" name="title_uz" required=""
                                placeholder="Enter food's title_uz" value="{{$foods->title_uz}}">

                            <div class="invalid-feedback">
                                @error('title_uz')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="from-group">
                            <label for="title_ru">Ru:</label>
                            <input id="title_ru" type="text"
                                class="form-control @error('title_ru') is-invalid @enderror" name="title_ru" required="" value={{$foods->title_ru}}
                                placeholder="Введите название продукта" >
                        </div>
                        <div class="from-group">
                            <label for="title_en">En:</label>
                            <input id="title_en" type="text"
                                class="form-control @error('title_en') is-invalid @enderror" name="title_en" required="" value={{$foods->title_en}}
                                placeholder="Entername of product" >
                        </div>

                        <div class="form-group">
                            <label for="description_uz">@lang('words.food_description_uz')</label>
                            <input id="description_uz" type="text"
                                class="form-control @error('description_uz') is-invalid @enderror" name="description_uz" required=""
                                placeholder="Enter food's description_uz" value="{{$foods->description_uz}}">

                            <div class="invalid-feedback">
                                @error('description_uz')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="description_ru">En:</label>
                            <input id="description_ru" type="text"
                                class="form-control @error('description_ru') is-invalid @enderror" name="description_ru" required="" value={{$foods->description_ru}}
                                placeholder="Entername of product" >
                        </div>
                        <div class="from-group">
                            <label for="description_en">En:</label>
                            <input id="description_en" type="text"
                                class="form-control @error('description_en') is-invalid @enderror" name="description_en" required="" value={{$foods->description_en}}
                                placeholder="Entername of product" >
                        </div>
                        <div class="form-group">
                            <label for="price">@lang('words.food_price')</label>
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
                            <label for="image">@lang('words.food_image')</label>
                            <input id="image" type="file" class="form-control" name="image" >
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                          </div>
                    </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">@lang('words.submit')</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    
    $('#title_uz').on('input', function() {
            translateText('title_uz', 'title_en', 'uz', 'en');
            translateText('title_uz', 'title_ru', 'uz', 'ru');
        });
        $('#description_uz').on('input', function() {
            translateText('description_uz', 'description_en', 'uz', 'en');
            translateText('description_uz', 'description_ru', 'uz', 'ru');
        });
</script>

@endsection
