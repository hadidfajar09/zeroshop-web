@extends('admin.admin_master')

@section('title')
    All Brands
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
                              <li class="breadcrumb-item" aria-current="page">Brand</li>
                              <li class="breadcrumb-item active" aria-current="page">Brands List</li>
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
                <h3 class="box-title">Brands List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand Name</th>
                              <th>Brand Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $row)
                              
                          
                          <tr>
                              <td>{{ $row->brand_name }}</td>
                              <td>
                                  <img src="{{ asset($row->brand_image ) }}" alt="" style="widht: 70px; height: 80px;" > 
                                </td>
                              <td>
                                   <a href="{{ route('edit.brand', $row->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                  <a href="{{ route('delete.brand', $row->id) }}" id="delete" data-name="{{ $row->brand_name }}" class="btn btn-danger btn-sm" title="Delete Data">
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
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                      @csrf
                                  <div class="form-group">
                                      <h5>Brand Name<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{ old('brand_name') }}">
                                          @error('brand_name')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                            
    <div class="form-group">
      <h5>Brand Image<span class="text-danger">*</span></h5>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="brand_image" id="brand_image">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @error('brand_image')
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