@extends('master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.edit_product') }}</h3>
    </div>
    <hr>



    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('language.product') }}</h4>
                <div class="mb-3">
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name" class="form-label">{{ __('language.name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"><br>
                        @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="price" class="form-label">{{ __('language.price') }}</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}"><br>
                        @error('price')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="description" class="form-label">{{ __('language.description') }}</label>
                        <input type="text" class="form-control" name="description"
                            value="{{ $product->description }}"><br>
                        @error('description')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="description_ct" class="form-label">{{ __('language.depcriptions') }}</label>
                        <input type="text" class="form-control" name="description_ct"
                            value="{{ $product->description_ct }}"><br>
                        @error('description_ct')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="quantity" class="form-label">{{ __('language.quantity') }}</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}"><br>
                        @error('quantity')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                        <label for="status" class="form-label">{{ __('language.status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $product->status == '1' ? '1' : '' }}>{{ __('language.stocking') }}</option>
                            <option value="0" {{ $product->status == '0' ? '0' : '' }}>{{ __('language.out_of_stock') }}</option>
                        </select><br>

                        <label for="category_id" class="form-label">{{ __('language.category') }}</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select><br>

                        <label for="image" class="form-label">{{ __('language.image') }}</label>
                        <input class="form-control" name="image" value="{{ $product->image }}" type="file"><br>

                        <input type="submit" class="btn btn-success btn-rounded btn-fw" value="{{ __('language.confirm') }}">

                        <a class="btn btn-danger btn-rounded btn-fw"
                            href="{{ route('product.index') }}">{{ __('language.go_back') }}</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
