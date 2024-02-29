@extends('master')
<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<h1 style="text-align: center" >BẢNG DANH MỤC</h1>
<ul style="list-style-type: none;">
<li class="">
    <select class=" changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
    </select>
</li>
</ul>
    <div class="container">
        <a class="btn btn-primary" href="/category/create">Thêm</a>
        {{-- <form action="{{ route('category.search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Enter keyword" value="{{ old('keyword') }}">
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form> --}}




    </div>
    
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th scope="col">{{ __('message.Product_company') }}</th>

                <th scope="col">{{ __('message.action') }}</th>

                <!-- Thêm các cột khác nếu cần -->
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $r)
                <tr>
                    <td>{{ $r->name }}</td>
                    <td>
                        <form action="{{ route('category.destroy', $r->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="badge badge-info" href="{{route('category.edit',$r->id)}}">{{ __('message.edit') }}</a>
                            <button class="badge badge-danger" type="submit">{{ __('message.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links('pagination::bootstrap-4') }}
@endsection
{{--  --}}
