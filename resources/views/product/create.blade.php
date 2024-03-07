@extends('master')
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.add_new_product') }}</h3>
    </div>
    <hr>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="form-label">{{ __('language.name') }}</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="price" class="form-label">{{ __('language.price') }}</label>
                        <input type="text" name="price" id="price" class="form-control"
                            value="{{ old('price') }}">
                        @error('price')
                            <div  class="alert alert-danger" style="  color: red">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="description" class="form-label">{{ __('language.description') }}</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ old('description') }}">
                        @error('description')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror
                        <br>


                        <label for="description_ct" class="form-label">{{ __('language.descriptions') }}</label>

                        <textarea name="description_ct" id="description_ct"  value="{{ old('description_ct') }}"></textarea>


                        {{-- <input type="text" name="description_ct" id="description_ct" class="form-control"
                            value="{{ old('description_ct') }}"> --}}
                        @error('description_ct')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="quantity" class="form-label">{{ __('language.quantity') }}</label>
                        <input type="text" name="quantity" id="quantity" class="form-control"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="status" class="form-label">{{ __('language.status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Vui lòng chọn trạng thái</option>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('language.active') }}</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('language.inactive') }}</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror

                        <br>
                        <label for="category_id" class="form-label">{{ __('language.category') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Vui lòng chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror
                        <br>
                        <label for="image" class="form-label">{{ __('language.image') }}</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <br>

                        <input type="submit" class="btn btn-success btn-rounded btn-fw"
                            value="{{ __('language.confirm') }}">

                        <a class="btn btn-danger btn-rounded btn-fw"
                            href="{{ route('product.index') }}">{{ __('language.go_back') }}</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#description_ct'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
