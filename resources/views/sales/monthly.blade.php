@extends('layouts.admin')

@section('content')
    <h1>Monthly Sales Report</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->month }}</td>
                    <td>{{ $sale->total_sales }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
