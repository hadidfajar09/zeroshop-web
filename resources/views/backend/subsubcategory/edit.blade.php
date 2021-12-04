@extends('admin.admin_master')

@section('title')
    Edit Sub SubCategory
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
                              <li class="breadcrumb-item"><a href="{{ route('all.subsubcategory') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Edit  Sub->SubCategory</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Sub->SubCategory List</li>
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
                 <h3 class="box-title">Edit Sub->SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.subsubcategory') }}" method="post">
                      @csrf

                      <input type="hidden" name="id" value="{{ $subsubcat->id }}">
                      
                      <div class="form-group">
                        <h5>Category<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="category_id" class="form-control">
                            <option value="" selected="" disabled>Select Category</option>
                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}"  
                               
                              @if($subsubcat->category_id == $row->id) selected @endif
                              
                              >{{ $row->category_name_en }}</option>
                        @endforeach
                          </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @php
                         $subcategory = DB::table('sub_categories')->where('category_id',$subsubcat->category_id)->get();
                    @endphp
                    <div class="form-group">
                      <h5>SubCategory<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="subcategory_id" class="form-control">
                          <option value="" selected="" disabled>Select SubCategory</option>
                          @foreach ($subcategory as $row)
                          <option value="{{ $row->id }}"  
                             
                            @if($subsubcat->subcategory_id == $row->id) selected @endif
                            
                            >{{ $row->subcategory_name_en }}</option>
                      @endforeach
                        </select>
                          @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                                  <div class="form-group">
                                      <h5>Sub->SubCategory Ind<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="subsubcategory_name_ind" id="subsubcategory_name_ind" class="form-control" value="{{ $subsubcat->subsubcategory_name_ind }}">
                                          @error('subsubcategory_name_ind')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <h5>Sub->SubCategory En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en" class="form-control" value="{{ $subsubcat->subsubcategory_name_en }}">
                                        @error('subsubcategory_name_en')
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
            $('select[name="category_id"]').on('change',function(){
              var category_id = $(this).val();
              if(category_id){
                $.ajax({
                  url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                  type: "GET",
                  dataType: "json",
                  success:function(data){
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
          });
    </script>

  @endsection
