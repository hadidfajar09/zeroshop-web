@extends('admin.admin_master')

@section('title')
    All Category
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
                              <li class="breadcrumb-item" aria-current="page">Category</li>
                              <li class="breadcrumb-item active" aria-current="page">Category List</li>
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
                <h3 class="box-title">Category List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Icon</th>
                              <th>Category Ind</th>
                              <th>Category En</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($category as $row)
                              
                          
                          <tr>
                            <td> <span><i class="{{ $row->category_icon }}"></i></span></td>
                              <td>{{ $row->category_name_ind }}</td>
                              <td>{{ $row->category_name_en }}</td>
                              
                              <td width="30%">
                                   <a href="{{ route('edit.category', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                  <a href="{{ route('delete.category', $row->id) }}" id="delete" data-name="{{ $row->category_name_ind }}" class="btn btn-danger btn-sm" title="Delete Data">
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
                 <h3 class="box-title">Add Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.category') }}" method="post">
                      @csrf
                                  <div class="form-group">
                                      <h5>Category Ind<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="category_name_ind" id="category_name_ind" class="form-control" value="{{ old('category_name_ind') }}">
                                          @error('category_name_ind')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <h5>Category En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" id="category_name_en" class="form-control" value="{{ old('category_name_en') }}">
                                        @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Icon<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" id="category_icon" class="form-control" value="{{ old('category_icon') }}">
                                        @error('category_icon')
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
