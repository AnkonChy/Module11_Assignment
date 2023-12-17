@extends('layouts.app')

@section('content')

<h1>Product List</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Last Sale Quantity</th>
            <th>Last Sale Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>

           
            @php
            $lastSale = DB::table('sell_details')
            ->where('product_id', $product->id)
            ->latest('sold_at')
            ->first();
            @endphp

            <td>{{ $lastSale ? $lastSale->quantity_sold : 'N/A' }}</td>
            <td>{{ $lastSale ? $lastSale->sold_at : 'N/A' }}</td>

            <td>
                <a href="{{ url('/products/'.$product->id.'/edit') }}">Edit Price</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection