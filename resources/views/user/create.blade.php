@extends('master')
@section('content')
    <main class="page-content">
        <section class="wrapper">
            <div class="panel-panel-default">
                <div class="market-updates">
                    <div class="container">
                        <div class="page-inner">
                            <header class="page-title-bar">
                                <link rel="stylesheet"
                                        href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                                        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                                        crossorigin="anonymous">
                                    <div class="card-header py-3">
                                        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.Register_for_an_HR_account') }}</h3>
                                    </div>
                                    <hr>
                            </header>
                            <div class="page-section">
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <legend>{{ __('language.basic_information') }}</legend>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="tf1">Email<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="email" type="text" class="form-control"
                                                            value="{{ old('email') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('email')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="tf1">{{ __('language.password') }}<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="password" type="text" class="form-control"
                                                            value="{{ old('password') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('password')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">{{ __('language.first_and_last_name') }}<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="name" type="text" class="form-control"
                                                            value="{{ old('name') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">{{ __('language.phone') }}<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="phone" type="number" class="form-control"
                                                            value="{{ old('phone') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('phone')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">{{ __('language.Date_of_birth') }}<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="birthday" type="date" class="form-control"
                                                            value="{{ old('birthday') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('birthday')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="control-label" for="flatpickr01">{{ __('language.position') }}<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <select name="group_id" id="" class="form-control">
                                                        <option value="">--Vui lòng chọn--</option>
                                                        @foreach ($groups as $group)
                                                            <option value="{{ $group->id }}">{{ $group->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ('group_id')
                                                        <p style="color:red">{{ $errors->first('group_id') }}</p>
                                                    @endif
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="control-label" for="flatpickr01">{{ __('language.gender') }}<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <select name="gender" id="" class="form-control">
                                                        <option value="">--Vui lòng chọn--</option>
                                                        <option value="Nam">Nam</option>
                                                        <option value="Nữ">Nữ</option>
                                                        <option value="Khác">Khác</option>
                                                        {{-- @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach --}}
                                                    </select>
                                                    @if ('gender')
                                                        <p style="color:red">{{ $errors->first('gender') }}</p>
                                                    @endif
                                                </div>
                                                <div class="form-group has-warning">
                                                    <label class="col-lg-3 control-label">{{ __('language.image') }}</label>
                                                    <div class="col-lg-4">
                                                        <input accept="image/*" type='file' id="inputFile"
                                                            name="image" /><br>
                                                        <img type="hidden" width="90px" height="90px" id="blah"
                                                            src="#" alt="" />
                                                        <br>
                                                    </div>
                                                </div>

                                                {{-- địa chỉ --}}
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="tf1">{{ __('language.address') }}<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="address" type="text" class="form-control"
                                                            value="{{ old('address') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('address')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <br><br><br><br>
                                                <button class="btn btn-success btn-rounded btn-fw" type="submit">{{ __('language.submit') }}</button>
                                                <a class="btn btn-danger btn-rounded btn-fw" href="{{ route('user.index') }}">{{ __('language.go_back') }}</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
