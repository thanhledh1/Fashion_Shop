{{-- @extends('masteradmin') --}}
{{-- @section('content') --}}
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Category</h4>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <label for="name">
                        <th scope="col">{{ __('message.Product_company') }}</th>
                        :
                    </label>
                    <input class="form-control" type="text" name="name" id="name"><br>

                    @error('name')
                        <div style="color: red">{{ $message }}</div>
                    @enderror

                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
{{-- @endsection --}}
