@extends('layouts.app')

@section('content')
<h1>Add a New Product</h1>


@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ url('/products') }}" method="post">
    @csrf

    <label for="name">Product Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="{{ old('quantity') }}" required>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="{{ old('price') }}" required>

    <button type="submit">Add Product</button>
</form>
@endsection