@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h1>@lang("words.category_table")</h1>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{ route('categories.index') }}">@lang("words.back")</a>
            </div>
            <div class="col_12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>@lang("words.category_create")</th>
                                        <th>@lang("words.date")</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $category['name_' . \App::getLocale()] }}</td>
                                        <td>{{ $category->created_at }}</td>
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
