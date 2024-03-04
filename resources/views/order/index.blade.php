@extends('master')
@section('content')
    <h1 style="text-align: center">Đơn hàng</h1>
    <hr>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-header">{{ __('language.customer') }}</h5>
                <p class="card-description">
                </p>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">price</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->customer->email }}</td>
                    <td>{{ $item->customer->phone }}</td>
                    <td>{{ $item->customer->address }}</td>
                    <td>{{ $item->status }}</td>


                    <td>
                        <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-rounded btn-fw" href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                            <button class="btn btn-danger btn-rounded btn-fw" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
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
@endsection
