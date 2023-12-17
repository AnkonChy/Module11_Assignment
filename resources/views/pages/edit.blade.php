@extends('layouts.app')

@section('content')

<h1>Edit Product</h1>

<form action="{{ url('/products/'.$product->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="name">Product Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" value="{{ $product->quantity }}" required>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>

    <button type="submit">Save Changes</button>
</form>

@endsection