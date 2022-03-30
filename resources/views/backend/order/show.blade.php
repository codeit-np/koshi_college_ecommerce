@extends('backend.app')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/order" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <address>
                            Order No: {{ $order->id }} <br>
                            Date: {{ $order->created_at }} <br>
                            Customer Name: {{ $order->user->name }} <br>
                            Mobile: {{ $order->user->mobile }} <br>
                            Delivery Address: {{ $order->user->address }} <br>
                        </address>

                        <table class="table">
                            <tr>
                                <th>SN</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>

                            @foreach ($order->order_descriptions as $index=> $item)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->rate }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="4">Grand Total</td>
                                <td ><span class="class="fs-4"">{{ $order->total }}</span></td>
                            </tr>
                        </table>

                        <a href="" class="btn btn-primary" onclick="window.print()">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
