<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
              <li>

                @auth
                     <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>@if (session()->get('lang') == 'en')  My Account @else Akun Saya @endif</a>
                    @else
                    <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>@if (session()->get('lang') == 'en')Login/Register @else Masuk/Daftar @endif</a>

                @endauth
               
              </li>
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if (session()->get('lang') == 'en') Language @else Bahasa @endif
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if (session()->get('lang') == 'en')
                  <li><a href="{{ route('indo.lang') }}">Indonesia</a></li>    
                  @else
                  <li><a href="{{ route('en.lang') }}">English</a></li>
                  @endif
                  
                  
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cardQty"> </span></div>
                <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="sign">Rp.</span><span class="value" id="cartSubTotal"> </span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  

                  {{-- MINI CART AJAX --}}

                  <div id="miniCart">

                  </div>


                  {{-- MINI CART AJAX --}}





                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total : Rp.</span><span class='price' id="cartSubTotal"> </span> </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" >  @if (session()->get('lang') == 'en') Home @else Beranda @endif</a> </li>
                 

                  @php
                      $categories = App\Models\Category::orderBy('category_name_ind','asc')->limit(6)->get();
                  @endphp

                  @foreach($categories as $category)
                  <li class="dropdown mega-menu"> 
                  <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                      @if (session()->get('lang') == 'en') {{ $category->category_name_en }} @else {{ $category->category_name_ind }} @endif
                  </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            @php
                              $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_ind','asc')->get();
                            @endphp

                            @foreach ($subcategories as $subcategory)
                                
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <a href="{{ url('subcategory/product/'.$subcategory->id.'/'. $subcategory->subcategory_slug_ind) }}">
                              <h2 class="title">
                                @if (session()->get('lang') == 'en') {{ $subcategory->subcategory_name_en }} @else {{ $subcategory->subcategory_name_ind }} @endif
                              </h2>
                            </a>


                                                 
                  @php
                  $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_ind','asc')->get();
              @endphp
                              <ul class="links">
                                
                                @foreach ($subsubcategories as $subsubcategory)
                                <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'. $subsubcategory->subsubcategory_slug_ind) }}">
                                  @if (session()->get('lang') == 'en') {{ $subsubcategory->subsubcategory_name_en }} @else {{ $subsubcategory->subsubcategory_name_ind }} @endif 
                                </a></li>    
                                @endforeach
                                
                            
                              </ul>
                            </div>
                            <!-- /.col -->
                            @endforeach


                            <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="{{ asset('frontend/assets/images/banners/tes.jpg') }}"></a> </div>
                          </div>
                          <!-- /.row --> 
                        </div>
                        <!-- /.yamm-content --> </li>
                    </ul>
                  </li>

                  @endforeach
                
                    <ul class="dropdown-menu pages">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-menu">
                              <ul class="links">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="category.html">Category</a></li>
                                <li><a href="detail.html">Detail</a></li>
                                <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog Detail</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="sign-in.html">Sign In</a></li>
                                <li><a href="my-wishlist.html">Wishlist</a></li>
                                <li><a href="terms-conditions.html">Terms and Condition</a></li>
                                <li><a href="track-orders.html">Track Orders</a></li>
                                <li><a href="product-comparison.html">Product-Comparison</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="404.html">404</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>