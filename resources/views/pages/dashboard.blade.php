@extends('layouts.app')

@section('content')

<h1>Welcome to the Dashboard</h1>


<div>
    <h2>Sales Figures</h2>
    <ul>
        <li>Today's Sales: ${{ $todaySales }}</li>
        <li>Yesterday's Sales: ${{ $yesterdaySales }}</li>
        <li>This Month's Sales: ${{ $thisMonthSales }}</li>
        <li>Last Month's Sales: ${{ $lastMonthSales }}</li>
    </ul>


</div>
<a href="{{ url('/products/create') }}">
    <button>Add Product</button>
</a>
@endsection