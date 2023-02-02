@extends('main')
@section('meta')
<title>{{ isset($meta->meta_title)?$meta->meta_title:'italiano' }}</title>
<meta name="meta_keyword" content="{{ isset($meta->meta_keyword)?$meta->meta_keyword:'italiano' }}">
<meta name="meta_description" content="{{ isset($meta->meta_description)?$meta->meta_description:'italiano' }}">
@endsection
@section('content')



  <!-- Trending products-->
  <section class="section section-sm bg-default">
    <div class="container">
      <div class="oh">
        <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
          <h4 class="title-decoration-lines-content">Trending Products Album</h4>
        </div>
      </div>
      <div class="row row-40 justify-content-center">
        <div class="col-sm-8 col-md-7 col-lg-4 wow fadeInLeft" data-wow-delay="0s">
          <div class="box-ordered-2">
            <img src="{{ asset('frontend/images/image-map-1-570x715.jpg') }}" alt="" width="570" height="715" />
          </div>
        </div>
        <div class="col-md-5 col-lg-8">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-14-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Tissue Holder</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price product-price-old">$400.00</div>
                        <div class="product-price">$500.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInLeft" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-15-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Soap Case</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price">$150.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInLeft" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-16-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Towel Hanger</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price">$520.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-17-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Basin Tray & Mirror</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price">$350.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-17-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Accessories</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price">$350.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-4">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="{{ asset('frontend/images/product-17-270x280.png') }}" alt="" width="270" height="280" />
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="cart-page.html">Go To</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h5 class="product-title"><a href="single-product.html">Bath Tub & Geyser</a></h5>
                      <div class="product-price-wrap">
                        <div class="product-price">$350.00</div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="cart-page.html">Go To</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
