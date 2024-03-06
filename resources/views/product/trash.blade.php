@extends('master')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h2 class="offset-4">{{ __('language.Product_trash') }}</h2>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-header">{{ __('language.trash') }}</h5>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> {{ __('language.name') }} </th>
                                <th> {{ __('language.price') }} </th>
                                <th style="width:15%"> {{ __('language.description') }} </th>
                                <th> {{ __('language.quantity') }} </th>
                                <th> {{ __('language.image') }} </th>
                                <th> {{ __('language.status') }} </th>
                                <th> {{ __('language.category') }} </th>
                                <th> {{ __('language.your_actions') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr data-expanded="true" class="item-{{ $product->id }}">
                                    <td style="width:5%">{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <img style="width:200px ; height: 165px ; border-radius:0%"
                                            src="{{ asset('admin/uploads/product/' . $product->image) }}" alt="">
                                    </td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->category->name }}</td>

                                    <td>
                                        <form action="{{ route('product.restoreProduct', $product->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit"
                                                class="btn btn-outline-success">{{ __('language.restore') }}</button>
                                            <a href="{{ route('product_destroy', $product->id) }}"
                                                id="{{ $product->id }}"
                                                class="btn btn-outline-danger">{{ __('language.delete') }}</a>
                                        </form>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{ $products->appends(request()->query()) }}
    </div>
    <a class="btn btn-outline-info" href="{{ route('product.index') }}">{{ __('language.go_back') }}</a>
@endsection
