<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
      @if (session()->get('lang') == 'en') Hot Deals @else Penawaran Menarik @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

      @foreach ($hotdeals as $product)
          @if ($product->status == 1)
          <div class="item">
            <div class="products">
              <div class="hot-deal-wrapper">
                <div class="image"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </div>
                                  @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = $amount/$product->selling_price * 100;
          $hasil = 100 - $discount;
          @endphp
                <div class="sale-offer-tag"><span style="font-size: 12px">
                  {{ round($hasil)  }}%
                  <br>
                  off</span></div>
                <div class="timing-wrapper">
                  <div class="box-wrapper">
                    <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                  </div>
                  <div class="box-wrapper">
                    <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                  </div>
                  <div class="box-wrapper">
                    <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                  </div>
                  <div class="box-wrapper hidden-md">
                    <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                  </div>
                </div>
              </div>
              <!-- /.hot-deal-wrapper -->
              
              <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'. $product->product_slug_ind) }}">
                  @if (session()->get('lang') == 'en') {{ Str::limit($product->product_name_en,50) }} @else {{ Str::limit($product->product_name_ind,50) }} @endif
                </a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price"> <span class="price"> 
                  @if ($product->discount_price)
                  Rp.{{ $product->selling_price - $product->discount_price }}    
                  @endif
                </span> <span class="price-before-discount">
                                              
                  Rp.{{ $product->selling_price }}

                </span> </div>
                <!-- /.product-price --> 
                
              </div>
              <!-- /.product-info -->
              
              <div class="cart clearfix animate-effect">
                <div class="action">
                  <div class="add-cart-button btn-group">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                    <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                    
                    <button type="submit" class="btn btn-primary cart-btn" onclick="addToCart()">ADD TO CART</button>
                  </div>
                </div>
                <!-- /.action --> 
              </div>
              <!-- /.cart --> 
            </div>
          </div>
          @endif
      @endforeach

    
    </div>
    <!-- /.sidebar-widget --> 
  </div>