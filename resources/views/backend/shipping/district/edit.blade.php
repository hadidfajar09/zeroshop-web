@extends('admin.admin_master')

@section('title')
    Edit a District
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
                              <li class="breadcrumb-item"><a href="{{ route('all.district') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">District</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit District</li>
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
                 <h3 class="box-title">Edit District</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.district', $district->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $district->id }}">

                      <div class="form-group">
                        <h5>Division<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="division_id" class="form-control" aria-invalid="false">
                            <option value="" selected="" disabled>Select Division</option>
                            @foreach ($division as $row)
                                <option value="{{ $row->id }}"  
                                   
                                  @if($district->division_id == $row->id) selected @endif
                                  
                                  >{{ $row->division_name }}</option>
                            @endforeach
                          </select>
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                                  <div class="form-group">
                                    <h5>District Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name" id="district_name" class="form-control" value="{{ $district->district_name }}">
                                        @error('district_name')
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