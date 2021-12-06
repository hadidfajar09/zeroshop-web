@extends('admin.admin_master')

@section('title')
    All Sliders
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
                              <li class="breadcrumb-item" aria-current="page">Sliders</li>
                              <li class="breadcrumb-item active" aria-current="page">Sliders List</li>
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
                <h3 class="box-title">Sliders List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($sliders as $row)
                              
                          
                          <tr>
                            <td>
                                <img src="{{ asset($row->slider_img ) }}" alt="" style="widht: 70px; height: 80px;" > 
                              </td>
                              <td>{{ $row->title }}</td>
                              <td>{{ $row->description }}</td>
                              <td>
                                @if ($row->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">InActive</span>
                            @endif


                              </td>
                              <td style="width: 30%;">
                                   <a href="{{ route('edit.slider', $row->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                  <a href="{{ route('delete.slider', $row->id) }}" id="delete" data-name="{{ $row->title }}" class="btn btn-danger btn-sm" title="Delete Data">
                                    <i class="fa fa-trash"></i>
                                  </a> 
                                  
                                  @if ($row->status == 1)
                                  <a href="{{ route('inactive.slider', $row->id) }}"  class="btn btn-warning btn-sm" title="InActive Now">
                                    <i class="fa fa-arrow-down"></i>
                                  </a> 
                              @else
                              <a href="{{ route('active.slider', $row->id) }}" class="btn btn-success btn-sm" title=" Active Now">
                                <i class="fa fa-arrow-up"></i>
                              </a> 
                              @endif
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
                 <h3 class="box-title">Add Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
                      @csrf
                                  <div class="form-group">
                                      <h5>Title<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                          @error('title')
                                          <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <h5>Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="description" class="form-control" name="description" required="">{{ old('description') }}</textarea>
                                    </div>
                                </div>


                            
    <div class="form-group">
      <h5>Slider Image<span class="text-danger">*</span></h5>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="slider_img" id="slider_img">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @error('slider_img')
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