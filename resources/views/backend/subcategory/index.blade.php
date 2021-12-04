@extends('admin.admin_master')

@section('title')
    All SubCategory
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
                              <li class="breadcrumb-item" aria-current="page">SubCategory</li>
                              <li class="breadcrumb-item active" aria-current="page">SubCategory List</li>
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
                <h3 class="box-title">SubCategory List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>SubCategory Ind</th>
                              <th>SubCategory En</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subcat as $row)
                              
                          
                          <tr>
                             <td>{{ $row['category']['category_name_en'] }}</td>
                              <td>{{ $row->subcategory_name_ind }}</td>
                              <td>{{ $row->subcategory_name_en }}</td>
                              
                              <td width="20%">
                                   <a href="{{ route('edit.subcategory', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.subcategory', $row->id) }}" id="delete" data-name="{{ $row->subcategory_name_ind }}" class="btn btn-danger btn-sm" title="Delete Data">
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
                 <h3 class="box-title">Add SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.subcategory') }}" method="post">
                      @csrf

                      <div class="form-group">
                        <h5>Category<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="category_id" class="form-control" aria-invalid="false">
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
                                      <h5>SubCategory Ind<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="subcategory_name_ind" id="subcategory_name_ind" class="form-control" value="{{ old('subcategory_name_ind') }}">
                                          @error('subcategory_name_ind')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <h5>SubCategory En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_en" id="subcategory_name_en" class="form-control" value="{{ old('subcategory_name_en') }}">
                                        @error('subcategory_name_en')
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

  @endsection
