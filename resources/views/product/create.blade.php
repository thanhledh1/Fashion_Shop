{{-- @extends('admin.master')
@section('content') --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.add_new_product') }}</h3>
    </div>
    <hr>
    <div class="mb-3">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name" class="form-label">{{ __('language.name') }}</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="price" class="form-label">{{ __('language.price') }}</label>
            <input type="text" name="price" id="price" class="form-control">
            @error('price')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <br>

            <label for="description" class="form-label">{{ __('language.description') }}</label>
            <input type="text" name="description" id="description" class="form-control">
            @error('description')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <br>

            <label for="description_ct" class="form-label">{{ __('language.description_ct') }}</label>
            <input type="text" name="description_ct" id="description_ct" class="form-control">
            @error('description_ct')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <br>

            <label for="quantity" class="form-label">{{ __('language.quantity') }}</label>
            <input type="text" name="quantity" id="quantity" class="form-control">
            @error('quantity')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <br>

            <label for="status" class="form-label">{{ __('language.status') }}</label>
            <select name="status" id="status" class="form-control">
                <option value="chon trang thai">Vui lòng chọn trạng thái</option>
                <option value="1">Còn hàng</option>
                <option value="0">Hết hàng</option>
            </select>

            <br>
            <label for="category_id" class="form-label">{{ __('language.category') }}</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="Chọn">Vui lòng chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <br>
            <label for="image" class="form-label">{{ __('language.image') }}</label>
            <input type="file" name="image" id="image" class="form-control">
            <br>

            <input type="submit" class="btn btn-outline-success" value="{{ __('language.confirm') }}">

            <a class="btn btn-outline-danger" href="{{ route('product.index') }}">{{ __('language.go_back') }}</a>

        </form>
    </div>
{{-- @endsection --}}
