@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales Report</h1>

        <!-- Filtering options -->
        <form action="{{ route('sales.filter') }}" method="post">
            @csrf
            <!-- Add your filtering options here -->
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Sales report table -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over the sales data and display each row -->
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                        <td>{{ $sale->customer->first_name }} {{ $sale->customer->last_name }}</td>
                        <td>${{ number_format($sale->total_amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="pagination mt-4">
            {{ $sales->links() }}
        </div>

        <!-- Summary table -->
        <h2 class="mt-4">Summary</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Total Sales</th>
                    <th>Number of Sales</th>
                    <th>Total Customers Served</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${{ number_format($totalSales, 2) }}</td>
                    <td>{{ $numberOfSales }}</td>
                    <td>{{ $totalCustomers }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Top 5 products table -->
        <h2>Top 5 Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity Sold</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over the top 5 products data and display each row -->
                @foreach($topProducts as $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->quantity_sold }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Print button -->
        <button onclick="window.print()" class="btn btn-primary mt-4">Print</button>
    </div>
@endsection
