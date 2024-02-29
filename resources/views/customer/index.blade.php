@extends('master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.user_account') }}</h3>
    </div>
    <!-- DataTales Example -->
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
                                <th>Name</th>
                                <th>address</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>password</th>
                                <th>image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->password }}</td>
                                    <td><img style="width:50% ; height: 50%"
                                            src="{{ asset('admin/uploads/customer/' . $customer->image) }}" alt="">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $customers->links('pagination::bootstrap-4') }}
@endsection
