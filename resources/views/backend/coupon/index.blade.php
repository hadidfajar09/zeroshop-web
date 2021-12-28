@extends('admin.admin_master')

@section('title')
    All Coupon
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
                            <li class="breadcrumb-item" aria-current="page">Coupon</li>
                            <li class="breadcrumb-item active" aria-current="page">Coupon List</li>
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
              <h3 class="box-title">Coupon List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Coupon</th>
                            <th>Discount</th>
                            <th>Valid</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $row)
                        
                        <tr>
                          <td>
                             {{ $row->coupon_name }}
                            </td>
                            <td>{{ $row->coupon_discount }}%</td>
                            <td style="width: 25%;">
                              {{ Carbon\Carbon::parse($row->coupon_valid)->format('D, d F Y') }}
                              
                            </td>
                            <td>
                              @if ($row->coupon_valid >= Carbon\Carbon::now()->format('Y-m-d') )
                              <span class="badge badge-pill badge-success">Valid</span>
                          @else
                          <span class="badge badge-pill badge-danger">Invalid</span>
                          @endif


                            </td>
                            <td style="width: 30%;">
                                 <a href="{{ route('edit.coupon', $row->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                  <i class="fa fa-pencil"></i>
                                </a> 
                                <a href="{{ route('delete.coupon', $row->id) }}" id="delete" data-name="{{ $row->coupon_name }}" class="btn btn-danger btn-sm" title="Delete Data">
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
               <h3 class="box-title">Add Coupon</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form action="{{ route('store.coupon') }}" method="post" enctype="multipart/form-data">
                    @csrf
                                <div class="form-group">
                                    <h5>Coupon Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_name" id="coupon_name" class="form-control" value="{{ old('coupon_name') }}">
                                        @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                  <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="coupon_discount" id="coupon_discount" class="form-control" value="{{ old('coupon_discount') }}">
                                      @error('coupon_discount')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group">
                                <h5>Coupon Valid<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="coupon_valid" id="coupon_valid" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_valid')
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