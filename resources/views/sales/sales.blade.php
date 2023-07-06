@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Sales Report</h2>

            <h3>Weekly Report</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weeklySales as $date => $totalSales)
                        <tr>
                            <td>{{ $date }}</td>
                            <td>{{ config('settings.currency_symbol') }} {{ $totalSales }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Monthly Report</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlySales as $month => $totalSales)
                        <tr>
                            <td>{{ $month }}</td>
                            <td>{{ config('settings.currency_symbol') }} {{ $totalSales }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
