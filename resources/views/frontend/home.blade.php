@extends('frontend.app')
@section('content')
<!-- YOOUR DESIGN GOES HERE -->
@include('frontend.components.slide')
<!-- Featured Product -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <h5>Featured Product</h5>
            @foreach ($featuredProduct as $item)
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

<!-- Momos -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <h5>Momos Items</h5>
            @foreach ($momoItems as $item)
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

<!-- Thuppa -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <h5>Thuppa Items</h5>
            @foreach ($thuppaItems as $item)
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

<!-- Faculties -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-md-6">
                <h5>Our Faculties</h5>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum in sequi tempora dolore libero impedit itaque voluptate! Dolorem perferendis laboriosam consequatur quis quaerat nemo quam recusandae exercitationem asperiores saepe rem quibusdam, eum repellat cupiditate, veritatis fuga voluptatum earum deleniti? Rem necessitatibus quia harum nesciunt doloribus quisquam officia, blanditiis expedita facere.</p>

            </div>
        </div>
    </div>
</div>
@endsection
