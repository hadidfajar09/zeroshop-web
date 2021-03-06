@extends('admin.admin_master')

@section('title')
    Edit a Category
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
                              <li class="breadcrumb-item"><a href="{{ route('all.category') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Category</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.category', $category->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $category->id }}">

                                  <div class="form-group">
                                    <h5>Category Ind<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_ind" id="category_name_ind" class="form-control" value="{{ $category->category_name_ind }}">
                                        @error('category_name_ind')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                  <h5>Category En<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="category_name_en" id="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                                      @error('category_name_en')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group">
                                <h5>Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" id="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                    @error('category_icon')
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