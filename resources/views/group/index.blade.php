{{-- @extends('admin.master')
@section('content') --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary offset-4" style="text-align: center">{{ __('language.list_of_employee') }}</h3>
    </div>
    <hr>
    <main class="page-content">
        <div class="container">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel-panel-default">
                        <header class="page-title-bar">
                        </header>
                        <nav aria-label="breadcrumb">
                            @if (Auth::user()->hasPermission('Group_create'))
                                <a href="{{ route('group.create') }}" class="btn btn-outline-primary">{{ __('language.create_position') }}</a>
                            @endif
                        </nav>
                        <div>
                            <table class="table" ui-jq="footable"
                                ui-options='{
    "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
                                <thead>
                                    <tr>
                                        <th>{{ __('language.Order_Numerical') }}</th>
                                        <th>{{ __('language.name') }}</th>
                                        <th>{{ __('language.undertake_person') }}</th>
                                        <th data-breakpoints="xs">{{ __('language.your_actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($groups as $key => $group)
                                        <tr data-expanded="true" class="item-{{ $group->id }}">
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $group->name }} </td>
                                            <td>Hiện có {{ count($group->users) }} người</td>
                                            <td>
                                                <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if (Auth::user()->hasPermission('Group_update'))
                                                        <a class="btn btn-outline-info"
                                                            href="{{ route('group.detail', $group->id) }}">{{ __('language.authorize') }}</a>
                                                    @endif

                                                    @if (Auth::user()->hasPermission('Group_update'))
                                                        <a href="{{ route('group.edit', $group->id) }}"
                                                            class="btn btn-outline-warning">{{ __('language.update') }}</a>
                                                    @endif
                                                    @if (Auth::user()->hasPermission('Group_forceDelete'))
                                                        <a href="{{ route('group.destroy', $group->id) }}"
                                                            id="{{ $group->id }}" class="btn btn-outline-danger">{{ __('language.delete') }}</a>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $groups->appends(request()->query()) }} --}}
                        </div>
                    </div>
            </section>
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
                            timer: 1500
                        });
                    @endif
                });
            </script>
        {{-- @endsection --}}
