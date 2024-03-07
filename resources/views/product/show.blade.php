@extends('master')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <H1 style="text-align: center">CHI TIẾT SẢN PHẨM</H1>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                </p>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('language.information') }}</th>
                                <th>{{ __('language.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('language.name_Product') }}</td>
                                <td>{{ $product->name }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('language.price') }}</td>
                                <td>{{ number_format($product->price) }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('language.description') }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('language.quantity') }}</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('language.status') }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        Còn hàng
                                    @else
                                        Hết hàng
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('language.category') }}</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('language.image') }}</td>
                                <td>
                                    <img style="width:200px; height:165px; border-radius:0%"
                                        src="{{ asset('admin/uploads/product/' . $product->image) }}" alt="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
