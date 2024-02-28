abc
{{-- @extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.category') }}</h3>
        </div>
        <hr>
    <div class="wrapper">
        <nav>
            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <form action="{{ route('category.search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="{{ __('language.seach') }}"
                            value="{{ old('keyword') }}">
                    </form>
                </div>
            </div>
        </nav>
        <nav>
            <a href="/category/create" class="btn btn-outline-primary">{{ __('language.add_new') }}</a>
        </nav>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('language.name_category') }}</th>
                        <th>{{ __('language.your_actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if (Auth::user()->hasPermission('Category_delete'))
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger">{{ __('language.delete') }}</button>
                                @endif
                                @if (Auth::user()->hasPermission('Category_update'))
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-outline-info">{{ __('language.update') }}</a>
                                @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $categories->links('pagination::bootstrap-4') }}

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
                    timer: 2000
                });
            @endif
        });
    </script>
@endsection
<style>
    .wrapper nav {
        display: inline-block;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .input-group input::placeholder {
        color: #6c757d;
    }

    .input-group input:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .nav-item.dropdown {
        display: inline-block;
        position: relative;
    }

    .nav-item.dropdown .changeLang {
        padding: 8px 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
        font-size: 14px;
        color: #212529;
        cursor: pointer;
    }

    .nav-item.dropdown .changeLang:focus {
        outline: none;
    }

    .nav-item.dropdown .changeLang option {
        background-color: #fff;
        color: #212529;
    }
</style> --}}
