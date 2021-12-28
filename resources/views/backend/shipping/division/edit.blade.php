@extends('admin.admin_master')

@section('title')
    Edit a Shipping Devision
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
                              <li class="breadcrumb-item"><a href="{{ route('all.shipping') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Shipping Devision</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Shipping Devision</li>
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
                 <h3 class="box-title">Edit Shipping Devision</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.shipping', $shippings->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $shippings->id }}">

                                  <div class="form-group">
                                    <h5>Shipping Devision Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="division_name" id="division_name" class="form-control" value="{{ $shippings->division_name }}">
                                        @error('division_name')
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


  @endsection