@extends('master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.edit_category') }}</h3>
        </div>
        <hr>
    <form action="{{ route('category.update', $categories->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name" class="form-label">{{ __('language.name_category') }}</label>
        <input type="text" class="form-control" name="name" value="{{ $categories->name }}"><br>
        @error('name')
            <div style="color: red">{{ __('language.name_ct') }}</div>
        @enderror
        <input type="submit" class="btn btn-success btn-rounded btn-fw" value="{{ __('language.confirm') }}">

        <a class="btn btn-danger btn-rounded btn-fw" href="{{ route('category.index') }}">{{ __('language.go_back') }}</a>

    </form>
@endsection
