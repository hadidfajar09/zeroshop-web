@extends('admin.admin_master')

@section('title')
    Edit a Coupon
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
                              <li class="breadcrumb-item"><a href="{{ route('all.coupon') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Coupon</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
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
                 <h3 class="box-title">Edit Coupon</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.coupon', $coupons->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $coupons->id }}">

                                  <div class="form-group">
                                    <h5>Coupon Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_name" id="coupon_name" class="form-control" value="{{ $coupons->coupon_name }}">
                                        @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                  <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="coupon_discount" id="coupon_discount" class="form-control" value="{{ $coupons->coupon_discount }}">
                                      @error('coupon_discount')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group">
                                <h5>Coupon Valid<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="coupon_valid" id="coupon_valid" class="form-control" value="{{ $coupons->coupon_valid }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_valid')
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