@extends('master')
@section('content')
    <main class="page-content">
        <div class="container">
            <section class="wrapper">
                <main id="main" class="main">
                    <div class="panel-panel-default">
                        <div class="market-updates">
                            <div class="container">
                                <div class="pagetitle">

                                    <div class="card-header py-3">
                                        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">
                                            {{ __('language.position') }}</h3>
                                    </div>
                                </div>
                                <div class="page-section">
                                    <form method="post" action="{{ route('group.group_detail', $group->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="card">
                                            <div class="card-body">
                                                <hr>
                                                <div class="form-group">
                                                    <label
                                                        class="w3-button w3-blue">{{ __('language.grant_full_permissions') }}
                                                    </label>
                                                    <input type="checkbox" id="checkAll" class="form-check-input"
                                                        value="">
                                                    <hr>
                                                    <div class="row">
                                                        @foreach ($group_names as $group_name => $roles)
                                                            <div class="col-lg-6">
                                                                <div class="list-group-header"
                                                                    style="color:rgb(2, 6, 249) ;">
                                                                    <h5> Nhóm: {{ __($group_name) }}</h5>
                                                                </div>
                                                                @foreach ($roles as $role)
                                                                    <div
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <span
                                                                            style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                                        <!-- .switcher-control -->
                                                                        <label class="form-check form-switch ">
                                                                            <input type="checkbox"
                                                                                @checked(in_array($role['id'], $userRoles)) name="roles[]"
                                                                                class="checkItem form-check-input checkItem"
                                                                                value="{{ $role['id'] }}">
                                                                            <span class="switcher-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button class="btn btn-success btn-rounded btn-fw"
                                                        type="submit">{{ __('language.submit') }}</button>
                                                    <a href="{{ route('group.index') }}" class="btn btn-danger btn-rounded btn-fw"
                                                        type="submit">{{ __('language.go_back') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                </main>
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script>
                    $('#checkAll').click(function() {
                        $(':checkbox.checkItem').prop('checked', this.checked);
                    });
                </script>
            </section>
        </div>
    </main>
@endsection

<style>
    /* Add your custom styles here */

    .page-content {
        padding: 20px;
    }

    .container {
        margin-top: 20px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .list-group-header {
        background-color: #f0f0f0;
        padding: 10px;
        margin-bottom: 10px;
    }

    .list-group-item {
        padding: 10px;
        margin-bottom: 5px;
    }

    .form-actions {
        margin-top: 20px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .col-lg-6 {
            width: 100%;
        }
    }
</style>
