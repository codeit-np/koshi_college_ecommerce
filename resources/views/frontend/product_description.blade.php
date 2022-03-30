@extends('frontend.app')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    @foreach ($categories as $item)
                        <li><a href="/category/{{ $item->id }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-9 d-flex">
               <div>
                <img src="{{ asset($product->image) }}" width="250" alt="">
               </div>
               <div class="mx-5">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <div>
                    @if ($product->discount_percent>0)
                      <div>
                          <span class="text-danger text-decoration-line-through">NRs.{{ $product->price }}</span>
                          <span class="float-end">{{ $product->discount_percent }}% Off</span>
                      </div>
                    @endif
                    <span class="fs-4">Nrs.{{ $product->selling_price }}</span>

                    <form action="/cart" method="post">
                        @csrf
                        <div class="form-group">
                            <input id="qty" class="form-control" type="number" name="qty" value="1" min="1">
                            <input id="selling_price" class="form-control" type="number" name="selling_price" value="{{ $product->selling_price }}" hidden>
                            <input id="product_id" class="form-control" type="number" name="product_id" value="{{ $product->id }}" hidden>
                            @if (Auth::user())
                            <button type="submit" class="btn btn-primary my-2">Add To Cart</button>
                            @else
                            <a class="btn btn-primary my-2" href="/login">Add to Cart</a>
                            @endif

                        </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
