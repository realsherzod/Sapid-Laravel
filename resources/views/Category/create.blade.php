@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang('words.create_category')</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('categories.index') }}">@lang('words.back')</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <form class="needs-validation" autocomplete="off" action="{{ route('categories.store') }}" method="post"
                        enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name_uz">@lang('words.category_create')</label>
                                <input id="name_uz" type="text"
                                    class="form-control @error('name_uz') is-invalid @enderror" name="name_uz" required=""
                                    placeholder="@lang('words.placeholder_category')" value="{{ old('name_uz') }}">

                                <div class="invalid-feedback">
                                    @error('name_uz')
                                    @lang('words.placeholder_category')
                                    @else
                                    @lang('words.placeholder_category')
                                    @enderror
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="name_ru">Ru:</label>
                                <input id="name_ru" type="text"
                                    class="form-control @error('name_ru') is-invalid @enderror" name="name_ru" required=""
                                    placeholder="@lang('words.placeholder_category') (RU)" value="{{ old('name_ru') }}">
                            </div>
                            <div class="from-group">
                                <label for="name_en">En:</label>
                                <input id="name_en" type="text"
                                    class="form-control @error('name_en') is-invalid @enderror" name="name_en" required=""
                                    placeholder="@lang('words.placeholder_category') (EN)" value="{{ old('name_en') }}">
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
