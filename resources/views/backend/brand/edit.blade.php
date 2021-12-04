@extends('admin.admin_master')

@section('title')
    Edit a Brand
@endsection
@section('admin')
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('all.brand') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Brand</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
      
          <!-- /.col -->



          {{-- //add brand --}}

          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.brand', $brands->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $brands->id }}">
                      <input type="hidden" name="oldimage" value="{{ $brands->brand_image }}">
                                  <div class="form-group">
                                      <h5>Brand Name<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{ $brands->brand_name }}">
                                          @error('brand_name')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                            
    <div class="form-group">
      <h5>Brand Image<span class="text-danger">*</span></h5>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="brand_image" id="image">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @error('brand_image')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
    </div>

    <div class="form-group">
      <h5>Old Image<span class="text-danger">*</span></h5>
        <div class="controls">
            <img src="{{ asset($brands->brand_image) }}" alt="" id="showImage" style="width: 150px; height: 150px;">
        </div>
    </div>
  
                          <div class="text-xs-right">
                              <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                           </div>
                       
                     </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
 
          
             <!-- /.box -->          
           </div>






        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
          $('#image').change(function(e){
              var reader = new FileReader();
              reader.onload = function(e){
                  $('#showImage').attr('src', e.target.result);
              }
              reader.readAsDataURL(e.target.files['0'])
          });
      });
    </script>


  @endsection