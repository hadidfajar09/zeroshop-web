@extends('admin.admin_master')

@section('title')
    Edit a Product
@endsection
@section('admin')

<!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <div class="d-inline-block align-items-center">
                      <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('all.product') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Product</li>
                            <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
                        </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit a Product</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('update.product') }}">
                      @csrf

                      <input type="hidden" name="id" value="{{ $products->id }}">
                      {{-- row 1 --}}
                    <div class="row"> 
                      <div class="col-12">						

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="category_id" class="form-control" aria-invalid="false" required="">
                                        <option value="" selected="" disabled>Select Category</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}" 
                                              @if($products->category_id == $row->id) selected @endif
                                              >{{ $row->category_name_en }}</option>
                                        @endforeach
                                      </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            @php
                            $subcategory = DB::table('sub_categories')->where('category_id',$products->category_id)->get();
                       @endphp
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubCategory<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="subcategory_id" class="form-control" required="">
                                        <option value=""  selected="" disabled>Select SubCategory</option>
                                        @foreach ($subcategory as $row)
                                        <option value="{{ $row->id }}" 
                                          @if($products->subcategory_id == $row->id) selected @endif
                                          >{{ $row->subcategory_name_en }}</option>
                                    @endforeach
                                      </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                              

                            </div>


                            @php
                            $subsubcategory = DB::table('sub_sub_categories')->where('subcategory_id',$products->subcategory_id)->get();
                       @endphp
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub->SubCategory<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                      <select name="subsubcategory_id" class="form-control" required="">
                                        <option value="" selected="" disabled>Select Sub->SubCategory</option>
                                        @foreach ($subsubcategory as $row)
                                        <option value="{{ $row->id }}" 
                                          @if($products->subsubcategory_id == $row->id) selected @endif
                                          >{{ $row->subsubcategory_name_en }}</option>
                                    @endforeach
                                      </select>
                                        @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                              

                              
                            </div>

                        </div>  

                        {{-- row 2 --}}
                        <div class="row">
                            <div class="col-12">						
      
                              <div class="row">
                                  <div class="col-md-4">
      
                                    <div class="form-group">
                                        <h5>Select Brand<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                          <select name="brand_id" class="form-control">
                                            <option value="" selected="" disabled>Select Brand</option>
                                            @foreach ($brands as $row)
                                            <option value="{{ $row->id }}"
                                              @if($products->brand_id == $row->id) selected @endif
                                              >{{ $row->brand_name }}</option>
                                        @endforeach
                                          </select>
                                            @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                  </div>
      
                                  <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Name Ind <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_ind" class="form-control" required="" value="{{ $products->product_name_ind }}"> </div>
                                            @error('product_name_ind')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
      
                                  </div>
      
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control" required="" value="{{ $products->product_name_en }}"> </div>
                                            @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
                                    
      
                                  </div>
      
                              </div>  

                              <div class="row">
                                <div class="col-md-4">
    
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" class="form-control" required="" value="{{ $products->product_code }}"> </div>
                                            @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
                                  
                                </div>
    
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control" required="" value="{{ $products->product_qty }}"> </div>
                                            @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
    
                                </div>
    
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <h5>Product Tags Ind <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="product_tags_ind" class="form-control" value="{{ $products->product_tags_ind }}" data-role="tagsinput" required="" value="{{ old('product_tags_ind') }}"> </div>
                                          @error('product_tags_ind')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror

                                  </div>
                                  
    
                                </div>
    
                            </div>  
      
                            {{-- row 4 --}}
                            <div class="row">
                                <div class="col-md-4">
    
                                    <div class="form-group">
                                        <h5>Product Tags En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" required="" value="{{ old('product_tags_en') }}"> </div>
                                            @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
  
                                    </div>
                                  
                                </div>
    
                                <div class="col-md-4">

    
                                        <div class="form-group">
                                            <h5>Product Size Ind <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_ind" class="form-control" value="{{ $products->product_size_ind }}" data-role="tagsinput" value="{{ old('product_size_ind') }}"> </div>
                                                @error('product_size_ind')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
      
                                        </div>
                                      
    
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_en }}" data-role="tagsinput"> </div>
                                            @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
  
                                    </div>
                                  
    
                                </div>
    
                            </div>  
      
      
                            {{-- row 5 --}}
                            <div class="row">
                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <h5>Product Color Ind <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_ind" class="form-control" value="{{ $products->product_color_ind }}" data-role="tagsinput"> </div>
                                            @error('product_color_ind')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
  
                                    </div>
                                  
                                </div>
    
                                <div class="col-md-6">

    
                                        <div class="form-group">
                                            <h5>Product Color En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en" class="form-control" value="{{ $products->product_color_en }}" data-role="tagsinput"> </div>
                                                @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
      
                                        </div>
                                      
    
                                </div>
    
                            
    
                            </div>  

                            {{-- row 6 --}}
                            <div class="row">

                              <div class="col-md-6">

                                  

                                <div class="form-group">
                                <h5>Selling Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="selling_price" class="form-control" required="" value="{{ $products->selling_price }}"> </div>
                                @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>
                              
                                  

                            </div>



                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <h5>Discount Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}"> </div>
                                            @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
                                  
                                </div>
    
                         
                            
    
                            </div>  
                                
                            
                            {{-- row 7 --}}
                            <div class="row">
                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <h5>Short Description Ind <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_desc_ind" id="short_desc_ind" class="form-control" placeholder="Description" required="">{!! $products->short_desc_ind !!}</textarea>
                                        </div>
                                    </div>
                                  
                                </div>
    
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Short Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_desc_en" id="short_desc_en" class="form-control" placeholder="Description" required="">{!! $products->short_desc_en !!}</textarea>
                                        </div>
                                    </div>

                                      
    
                                </div>
    
                             
    
                            </div>  
      
                            {{-- row 8 --}}

                            <div class="row">
                                <div class="col-md-6">
    
                                    <div class="form-group">
                                        <h5>Long Description Ind <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="long_desc_ind" required="">
                                              {!! $products->long_desc_ind !!}
						                    </textarea>
                                        </div>
                                    </div>

                                  
                                </div>
    
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Long Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="long_desc_en" required="">
                                              {!! $products->long_desc_en !!}
						                    </textarea>
                                        </div>
                                    </div>
                                      
    
                                </div>
                            </div>  

                            <hr><br>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="hot_deals" @if($products->hot_deals == 1) checked @endif value="1">
                                            <label for="checkbox_2">Hot Deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="featured" @if($products->featured == 1) checked @endif value="1">
                                            <label for="checkbox_3">Features</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" @if($products->special_offer == 1) checked @endif value="1">
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="special_deals" @if($products->special_deals == 1) checked @endif value="1">
                                            <label for="checkbox_5">Special Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                            
                            </div>
                          </div>
                          <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                         </div>
                    </div>

                  
                     
                  
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>

      {{-- Multi Image --}}

      <section class="content">
        <div class="row">
     
     <div class="col-md-12">
             <div class="box bt-3 border-info">
               <div class="box-header">
          <h4 class="box-title">Product Thumbnail <strong>Update</strong></h4>
               </div>
     
               <div class="box-body">
           
         <form method="post" action="{{ route('update.thumbnail') }}" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="id" value="{{ $products->id }}">
             <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">

           <div class="row row-sm">
             <div class="col-md-6">
     <div class="card">
      <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top" style="height: 300px; width: 500px;">
      <div class="card-body">
        <h5 class="card-title">
    <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
         </h5>
        <p class="card-text"> 
          <div class="form-group">
           <div class="custom-file">
             <input type="file" class="custom-file-input" name="product_thumbnail" id="product_thumbnail" onchange="mainThumbnail(this)" required="">
             <label class="custom-file-label" for="customFile">Change</label> <br><br>
             <img src="" alt="" id="mainThumb">
             <br><br>
         
           </div>
          </div> 
        </p>
       
      </div>
     </div>
     
             </div><!--  end col md 3		 -->	
           </div>			
     
           <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Images">
         </div>
         </form>		   
               </div>
     
     
     
     
     
             </div>
             </div>
      
     
          
        </div> <!-- // end row  -->
        
     
      </section>

    
      <section class="content">
        <div class="row">
     
     <div class="col-md-12">
             <div class="box bt-3 border-info">
               <div class="box-header">
          <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
               </div>
     
               <div class="box-body">
           
         <form method="post" action="{{ route('update.multi') }}" enctype="multipart/form-data">
             @csrf
           <div class="row row-sm">
             @foreach($multiImgs as $img)
             <div class="col-md-3">
     <div class="card">
      <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
      <div class="card-body">
        <h5 class="card-title">
    <a href="{{ route('delete.multi', $img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
         </h5>
          <div class="form-group">
           <div class="custom-file">
            <input type="file" class="custom-file-input" name="multi_img[{{$img->id}}]" id="multiImg"  multiple="">
             <label class="custom-file-label" for="customFile">Change</label> <br><br>
             <br><br>

             <div class="row" id="preview_img"></div>
         
           </div>
          </div> 
       
      </div>
     </div>
     
             </div><!--  end col md 3		 -->	
             @endforeach
           </div>			
     
           <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Images">
         </div>
         </form>		   
               </div>
     
     
     
     
     
             </div>
             </div>
      
     
          
        </div> <!-- // end row  -->
        
     
      </section>
        
  
     
     


      <!-- /.content -->
    </div>

    
    <script type="text/javascript">
        $(document).ready(function(){
          $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
              $.ajax({
                url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                type: "GET",
                dataType: "json",
                success:function(data){
                  $('select[name="subsubcategory_id"]').html('');
                  var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key,value){
                        $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                      });
                },
              });
            }else{
              alert('danger');
            }
          });

          $('select[name="subcategory_id"]').on('change',function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
              $.ajax({
                url: "{{ url('/category/subsubcategory/ajax') }}/"+subcategory_id,
                type: "GET",
                dataType: "json",
                success:function(data){
                  
                  var d =$('select[name="subsubcategory_id"]').empty();
                      $.each(data, function(key,value){
                        $('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>');
                      });
                },
              });
            }else{
              alert('danger');
            }
          });
        });
  </script>

  <script type="text/javascript">
    function mainThumbnail(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
          reader.onload = function(e){
            $('#mainThumb').attr('src', e.target.result).width(500).height(300);
          };
          reader.readAsDataURL(input.files[0]);
      }
    }
  </script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
  @endsection
