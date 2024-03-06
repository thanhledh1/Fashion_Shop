@extends('master')
@section('content')
    <style>
        img#avt {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
        }
    </style>
    <main class="page-content">
        <section class="wrapper">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel-panel-default">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                            crossorigin="anonymous">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">
                                {{ __('language.Personnel') }}</h3>
                        </div>
                        <a href="{{ route('user.create') }}"
                            class="btn btn-primary btn-rounded btn-fw">{{ __('language.Register_for_an_HR_account') }}</a>
                        <br><br>   
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-header">{{ __('language.user') }}</h5>
                                    <p class="card-description">
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">

                                            <thead>
                                                <tr>
                                                    <th data-breakpoints="xs">{{ __('language.order_Numerical') }}</th>
                                                    <th>{{ __('language.avatar') }}</th>
                                                    <th>{{ __('language.name') }}</th>
                                                    <th>{{ __('language.phone') }}</th>
                                                    <th>{{ __('language.position') }}</th>
                                                    <th data-breakpoints="xs">{{ __('language.your_actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                @foreach ($users as $key => $user)
                                                    <tr data-expanded="true" class="item-{{ $user->id }}">
                                                        <td>{{ ++$key }}</td>
                                                        <td><a href="{{ route('user.show', $user->id) }}"><img
                                                                    id="avt"
                                                                    src="{{ asset('admin/uploads/user/' . $user->image) }}"
                                                                    alt=""></a></td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->group->name }}</td>
                                                        <td>
                                                            @if (Auth::user()->hasPermission('User_update'))
                                                                <a href="{{ route('user.edit', $user->id) }}"
                                                                    class="btn btn-info btn-rounded btn-fw">{{ __('language.update') }}</a>
                                                            @endif
                                                            @if (Auth::user()->hasPermission('User_forceDelete'))
                                                                <a data-href="{{ route('user.destroy', $user->id) }}"
                                                                    id="{{ $user->id }}"
                                                                    class="btn btn-danger btn-rounded btn-fw">{{ __('language.delete') }}</i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
            </section>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
            {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                $(document).on('click', '.deleteIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    let href = $(this).data('href');
                    let csrf = '{{ csrf_token() }}';
                    console.log(id);
                    Swal.fire({
                        title: 'Bạn có chắc không?',
                        text: "Bạn sẽ không thể hoàn nguyên điều này!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Có, xóa!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: href,
                                method: 'delete',
                                data: {
                                    _token: csrf
                                },
                                success: function(res) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Tệp của bạn đã bị xóa!',
                                        'success'
                                    )
                                    $('.item-' + id).remove();
                                },
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Tuổi...?',
                                text: ' Supper Admin không thể xóa!',
                            })
                        }
                    })
                });
            </script>

            <script>
                Swal.bindClickHandler()
                Swal.mixin({
                    toast: true,
                    icon: 'error',
                    text: "Ngu!",
                }).bindClickHandler('data-swal-toast-template')
            </script>
        </section>
    </main>
@endsection
