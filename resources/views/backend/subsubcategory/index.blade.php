@extends('admin.admin_master')

@section('title')
    All Sub SubCategory
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
                              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Sub->SubCategory</li>
                              <li class="breadcrumb-item active" aria-current="page">Sub->SubCategory List</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Sub->SubCategory List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>SubCategory</th>
                              <th>SubSubCat En</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subsubcat as $row)
                              
                          
                          <tr>
                             <td>{{ $row['category']['category_name_en'] }}</td>
                             <td>{{ $row['subcategory']['subcategory_name_en'] }}</td>
                              <td>{{ $row->subsubcategory_name_en }}</td>
                              
                              <td width="20%">
                                   <a href="{{ route('edit.subsubcategory', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.subsubcategory', $row->id) }}" id="delete" data-name="{{ $row->subsubcategory_name_ind }}" class="btn btn-danger btn-sm" title="Delete Data">
                                      <i class="fa fa-trash"></i>
                                    </a> 
                               
                              </td>
                              
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

         
            <!-- /.box -->          
          </div>
          <!-- /.col -->



          {{-- //add brand --}}

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Sub->SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.subsubcategory') }}" method="post">
                      @csrf

                      <div class="form-group">
                        <h5>Category<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="category_id" class="form-control">
                            <option value="" selected="" disabled>Select Category</option>
                            @foreach ($categories as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                            @endforeach
                          </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                      <h5>SubCategory<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="subcategory_id" class="form-control">
                          <option value="" selected="" disabled>Select SubCategory</option>
                          
                        </select>
                          @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                                  <div class="form-group">
                                      <h5>Sub->SubCategory Ind<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="subsubcategory_name_ind" id="subsubcategory_name_ind" class="form-control" value="{{ old('subsubcategory_name_ind') }}">
                                          @error('subsubcategory_name_ind')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <h5>Sub->SubCategory En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en" class="form-control" value="{{ old('subsubcategory_name_en') }}">
                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            
  
  
                          <div class="text-xs-right">
                              <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add">
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
