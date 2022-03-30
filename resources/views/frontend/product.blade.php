@extends('frontend.app')
@section('content')
<div class="py-5">
    <div class="container">
            <div class="row">
                @foreach ($products as $item)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($item->image) }}" class="card-img-top" height="200" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->name }}</h5>
                          <p class="card-text">{{ $item->description }}.</p>
                          <div>
                              @if ($item->discount_percent>0)
                                <div>
                                    <span class="text-danger text-decoration-line-through">NRs.{{ $item->price }}</span>
                                    <span class="float-end">{{ $item->discount_percent }}% Off</span>
                                </div>
                              @endif
                              <span class="fs-4">Nrs.{{ $item->selling_price }}</span>
                          </div>
                          <a href="/products/{{ $item->id }}" class="btn btn-primary">Go somewhere</a>

                        </div>
                      </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection
