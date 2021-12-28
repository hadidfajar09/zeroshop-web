@extends('admin.admin_master')

@section('title')
    Edit States
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
                              <li class="breadcrumb-item"><a href="{{ route('all.state') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Edit States</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit States List</li>
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
                 <h3 class="box-title">Edit States</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('update.state') }}" method="post">
                      @csrf

                      <input type="hidden" name="id" value="{{ $state->id }}">
                      
                      <div class="form-group">
                        <h5>Division<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="division_id" class="form-control">
                            <option value="" selected="" disabled>Select Division</option>
                            @foreach ($division as $row)
                            <option value="{{ $row->id }}"  
                               
                              @if($state->division_id == $row->id) selected @endif
                              
                              >{{ $row->division_name }}</option>
                        @endforeach
                          </select>
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @php
                         $district = DB::table('ship_districts')->where('division_id',$state->division_id)->get();
                    @endphp
                    <div class="form-group">
                      <h5>District<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="district_id" class="form-control">
                          <option value="" selected="" disabled>Select District</option>
                          @foreach ($district as $row)
                          <option value="{{ $row->id }}"  
                             
                            @if($state->district_id == $row->id) selected @endif
                            
                            >{{ $row->district_name }}</option>
                      @endforeach
                        </select>
                          @error('district_id')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                                  <div class="form-group">
                                      <h5>State Name<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="state_name" id="state_name" class="form-control" value="{{ $state->state_name }}">
                                          @error('state_name')
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
        $('select[name="division_id"]').on('change',function(){
          var division_id = $(this).val();
          if(division_id){
            $.ajax({
              url: "{{ url('/shipping/district/ajax') }}/"+division_id,
              type: "GET",
              dataType: "json",
              success:function(data){
                var d =$('select[name="district_id"]').empty();
                    $.each(data, function(key,value){
                      $('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
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
