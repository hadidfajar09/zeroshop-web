@extends('admin.admin_master')

@section('title')
    Edit a SubCategory
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
                              <li class="breadcrumb-item"><a href="{{ route('all.subcategory') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">SubCategory</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
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
                 <h3 class="box-title">Edit SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.subcategory', $subcat->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $subcat->id }}">

                      <div class="form-group">
                        <h5>Category<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="category_id" class="form-control" aria-invalid="false">
                            <option value="" selected="" disabled>Select Category</option>
                            @foreach ($categories as $row)
                                <option value="{{ $row->id }}"  
                                   
                                  @if($subcat->category_id == $row->id) selected @endif
                                  
                                  >{{ $row->category_name_en }}</option>
                            @endforeach
                          </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                                  <div class="form-group">
                                    <h5>SubCategory Ind<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_ind" id="subcategory_name_ind" class="form-control" value="{{ $subcat->subcategory_name_ind }}">
                                        @error('subcategory_name_ind')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                  <h5>SubCategory En<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="subcategory_name_en" id="subcategory_name_en" class="form-control" value="{{ $subcat->subcategory_name_en }}">
                                      @error('subcategory_name_en')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
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