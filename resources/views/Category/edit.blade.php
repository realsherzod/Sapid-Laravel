@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.edit')</h1>
            <div class="col-12 text-right mb-3">
<a class="btn btn-warning btn-sm" href="{{route('categories.index')}}">@lang('words.back')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <form class="needs-validation" autocomplete="off" action="{{route('categories.update', $categories->id)}}" method="post" enctype="multipart/form-data" novalidate="">
                     @csrf
                     @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>@lang('words.category_create')</label>
                                <input id="name_uz" type="text" class="form-control @error('name_uz') is-invalid @enderror" name="name_uz" required="" placeholder="Enter category's name" value="{{ $categories['name_' . \App::getLocale()] }}">
                                
                                <div class="invalid-feedback">
                                    @error('name_uz')
                                        {{ $message }}
                                    @else
                                        What's Category name?
                                    @enderror
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="name_ru">Ru:</label>
                                <input id="name_ru" type="text"
                                    class="form-control @error('name_ru') is-invalid @enderror" name="name_ru" required="" value={{$categories->name_ru}}
                                    placeholder="Введите название категории" >
                            </div>
                            <div class="from-group">
                                <label for="name_en">En:</label>
                                <input id="name_en" type="text"
                                    class="form-control @error('name_en') is-invalid @enderror" name="name_en" required=""  value={{$categories->name_en}}
                                    placeholder="Kategoriya nomini kiriting" >
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
    
    $('#name_uz').on('input', function() {
            translateText('name_uz', 'name_en', 'uz', 'en');
            translateText('name_uz', 'name_ru', 'uz', 'ru');
        });
</script>

@endsection
