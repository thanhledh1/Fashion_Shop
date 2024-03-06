
@extends('master')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('language.product') }}</h4>
            <div class="mb-3">
                        <form method="POST" action="{{ route('order.update', $order->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="customer_id">Customer ID</label>
                                <input id="customer_id" type="number" class="form-control" name="customer_id" value="{{ $order->customer_id }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date_at">Date</label>
                                <input id="date_at" type="date" class="form-control" name="date_at" value="{{ $order->date_at }}" required>
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea id="note" class="form-control" name="note" required>{{ $order->note }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="text" class="form-control" name="price" value="{{ $order->price }}" required>
                            </div>

                            <div class="form-group">
                                <label for="total">Total</label>
                                <input id="total" type="number" class="form-control" name="total" value="{{ $order->total }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="0" @if($order->status == 0) selected @endif>Đang xử lý</option>
                                    <option value="1" @if($order->status == 1) selected @endif>Hoàn thành</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-rounded btn-fw">Update</button>
                            <a class="btn btn-danger btn-rounded btn-fw"
                            href="{{ route('order.index') }}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
