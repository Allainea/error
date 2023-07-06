@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('report.index') }}">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <table class="table table-bordered table-hover" style="background-color: #526D82; text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th>Exchange</th>
                    <th>Date Added</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody style="background-color: #c3f0eb; text-align: center;">
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->getCustomerName() }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $order->formattedTotal() }}</td>
                    <td>{{ config('settings.currency_symbol') }} {{ $order->formattedReceivedAmount() }}</td>
                    <td>
                        @if ($order->receivedAmount() == 0)
                            <span class="badge badge-danger" style="background-color: red; color: white;">Not Paid</span>
                        @elseif ($order->receivedAmount() < $order->total())
                            <span class="badge badge-warning" style="background-color: orange; color: white;">Partial</span>
                        @elseif ($order->receivedAmount() == $order->total())
                            <span class="badge badge-success" style="background-color: green; color: white;">Paid</span>
                        @elseif ($order->receivedAmount() > $order->total())
                            <span class="badge badge-info" style="background-color: blue; color: white;">Change</span>
                        @endif
                    </td>
                    <td>
                        {{ config('settings.currency_symbol') }}
                        {{ number_format($order->receivedAmount() - $order->total(), 2) }}
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('orders.print', $order->id) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer"><i class="fas fa-print"></i> Print</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>

                </tr>
            </tfoot>
        </table>
        {{ $orders->render() }}
    </div>
</div>
@endsection