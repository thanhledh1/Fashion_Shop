@extends('master')
@section('content')
<style>
    label {
        margin-bottom: 0.5rem;
    }
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.product') }}</h3>
    </div>
    <hr>

    <div class="wrapper">
        <a href="/product/create" class="btn btn-primary btn-rounded btn-fw">{{ __('language.add_new') }}</a>
        <div class="container">
            <div class="form-outline" data-mdb-input-init>
                <form action="{{ route('product.search') }}" method="GET">
                    <label for="name">Tên sản phẩm:</label>
                    <input style=" width: 180px;
                    padding: 0.5rem;
                    margin-bottom: 1rem;
                    border: 1px solid #ccc;
                    border-radius: 4px;" type="text" name="name" id="name">

                    <label for="category">Danh mục sản phẩm:</label>
                    <input style=" width: 180px;
                    padding: 0.5rem;
                    margin-bottom: 1rem;
                    border: 1px solid #ccc;
                    border-radius: 4px;"  type="text" name="category" id="category">
                    <label for="status">Trạng thái sản phẩm:</label>
                    <select style=" width: 180px;
                    padding: 0.5rem;
                    margin-bottom: 1rem;
                    border: 1px solid #ccc;
                    border-radius: 4px;" name="status" id="status">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>


                    <button class="btn btn-primary btn-rounded btn-fw" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('language.name_Product') }}</th>
                                    <th>{{ __('language.price') }}</th>
                                    <th>{{ __('language.description') }}</th>
                                    <th>{{ __('language.quantity') }}</th>
                                    <th>{{ __('language.status') }}</th>
                                    <th>{{ __('language.category') }}</th>
                                    <th>{{ __('language.image') }}</th>
                                    <th>{{ __('language.your_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ Str::limit($product->description, 10) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if ($product->quantity == 0)
                                                Hết hàng
                                            @else
                                                Còn hàng
                                            @endif
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <img src="{{ asset('admin/uploads/product/' . $product->image) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <form action="{{ route('product.deleteProduct', $product->id) }}"
                                                method="post">
                                                @method('PUT')
                                                @csrf

                                                @if (Auth::user()->hasPermission('Product_update'))
                                                    <a href="{{ route('product.edit', [$product->id]) }}"
                                                        class="btn btn-info btn-rounded btn-fw">{{ __('language.update') }}</a>
                                                @endif
                            <a  class="btn btn-warning btn-rounded btn-fw" href="{{ route('product.show', $product->id) }}">Chi tiết</a>

                                                @if (Auth::user()->hasPermission('Product_delete'))
                                                    <button
                                                        onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không ?');"
                                                        type="submit"
                                                        class="btn btn-danger btn-rounded btn-fw">{{ __('language.delete') }}</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $products->links('pagination::bootstrap-4') }}

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script>
            $(document).ready(function() {
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 2000
                    });
                @endif
            });
        </script>
    @endsection

    <style>
        .wrapper nav {
            display: inline-block;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .input-group input::placeholder {
            color: #6c757d;
        }

        .input-group input:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .nav-item.dropdown {
            display: inline-block;
            position: relative;
        }

        .nav-item.dropdown .changeLang {
            padding: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #fff;
            font-size: 14px;
            color: #212529;
            cursor: pointer;
        }

        .nav-item.dropdown .changeLang:focus {
            outline: none;
        }

        .nav-item.dropdown .changeLang option {
            background-color: #fff;
            color: #212529;
        }
    </style>
