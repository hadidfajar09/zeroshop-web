<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> 
      @if (session()->get('lang') == 'en') Categories @else Kategori @endif
    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categories as $category)
            
    
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }} fa-10x" aria-hidden="true"></i>
          @if (session()->get('lang') == 'en') {{ $category->category_name_en }} @else {{ $category->category_name_ind }} @endif
        </a> 
          <!-- ================================== MEGAMENU VERTICAL ================================== -->
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_ind','asc')->get();
                @endphp

                @foreach ($subcategories as $subcategory)
                <div class="col-xs-12 col-sm-12 col-md-3">
                  <a href="{{ url('subcategory/product/'.$subcategory->id.'/'. $subcategory->subcategory_slug_ind) }}">
                  <h2 class="title">
                    @if (session()->get('lang') == 'en') {{ $subcategory->subcategory_name_en }} @else {{ $subcategory->subcategory_name_ind }} @endif
                  </h2> 
                </a>

                                                   
          @php
          $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_ind','asc')->get();
      @endphp
    
                  <ul class="links list-unstyled">
                    @foreach ($subsubcategories as $subsubcategory)

                    <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'. $subsubcategory->subsubcategory_slug_ind) }}">
                      @if (session()->get('lang') == 'en') {{ $subsubcategory->subsubcategory_name_en }} @else {{ $subsubcategory->subsubcategory_name_ind }} @endif 
                    </a></li>
                   @endforeach
                  </ul>
                </div>
                @endforeach
                       
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        @endforeach
     
  
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>