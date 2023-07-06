<!-- sales/report.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales Report</h1>

        <!-- Filtering options -->
        <form action="{{ route('sales.report') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4 d-flex align-items-end justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </form>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <!-- Sales report table -->
        <table class="table table-bordered table-hover" style="background-color: #526D82; text-align: center;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @if($sales->isEmpty())
                    <tr>
                        <td colspan="3">No sales records found.</td>
                    </tr>
                @else
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                            <td>{{ $sale->customer->first_name }} {{ $sale->customer->last_name }}</td>
                            <td>${{ number_format($sale->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>




        <!-- Pagination links -->
        <div class="pagination">
            {{ $sales->links() }}
        </div>


        <!-- Summary table -->
        <h2>Summary</h2>
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
                        <td>{{ $product->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Print button -->
        <button onclick="window.print()" class="btn btn-primary">Print</button>
    </div>
@endsection
