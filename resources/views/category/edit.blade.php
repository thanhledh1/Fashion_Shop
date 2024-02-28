{{-- @extends('masteradmin') --}}
{{-- @section('content') --}}
    <form action="{{ route('category.update', $categories->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{ __('message.Product_company') }}: <input type="text" name="name" value="{{ $categories->name }}"><br>
        @error('name')
        <div style="color: red">{{ $message }}</div>
    @enderror


        <input type="submit" value="SUBMIT">
    </form>
{{-- @endsection --}}
