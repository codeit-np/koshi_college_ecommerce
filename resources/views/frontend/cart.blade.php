@extends('frontend.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                   <table class="table table-light">
                       <thead>
                           <tr>
                               <th>SN</th>
                               <th>Image</th>
                               <th>Product</th>
                               <th>Qty</th>
                               <th>Rate</th>
                               <th>Amount</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                         @foreach ($cartItems as $index=>$item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td><img src="{{ asset($item->product->image) }}" width="60" alt=""></td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>
                                  <form action="/cart/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                </td>
                            </tr>
                         @endforeach
                       </tbody>
                   </table>

                   <form action="/order" method="POST">
                       @csrf
                       <button type="submit">Checkout</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
