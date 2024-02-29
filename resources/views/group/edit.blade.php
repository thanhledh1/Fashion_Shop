{{-- @extends('admin.master')
@section('content') --}}

<main class="page-content">
    <div class="container">
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            {{-- <a href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a> --}}
                        </nav>
                        <link rel="stylesheet"
                                        href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                                        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                                        crossorigin="anonymous">
                                    <div class="card-header py-3">
                                        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.permission_name') }}</h3>
                                    </div>
                    </header>
                    <hr>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal " action="{{ route('group.update', $group->id) }}"
                            method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group has-warning">
                                <label class="col-lg-2">{{ __('language.edit_permission') }}</label>
                                <div class="col-lg-8">
                                    <input type="text" value="{{$group->name}}" name="name" placeholder=""
                                        class=" @error('name') is-invalid @enderror form-control ">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-6">
                                    <button class="btn btn-outline-success" type="submit">{{ __('language.save_information') }}</button>
                                    <a href="{{ route('group.index') }}" class="btn btn-outline-danger"
                                        type="submit">{{ __('language.go_back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</main>
{{-- @endsection --}}
