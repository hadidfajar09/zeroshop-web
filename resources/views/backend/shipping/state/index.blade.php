@extends('admin.admin_master')

@section('title')
    All States
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
                              <li class="breadcrumb-item" aria-current="page">States</li>
                              <li class="breadcrumb-item active" aria-current="page">States List</li>
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
                <h3 class="box-title">States List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Division</th>
                              <th>District</th>
                              <th>State</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($state as $row)
                              
                          
                          <tr>
                             <td>{{ $row['division']['division_name'] }}</td>
                             <td>{{ $row['district']['district_name'] }}</td>
                              <td>{{ $row->state_name }}</td>
                              
                              <td width="20%">
                                   <a href="{{ route('edit.state', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.state', $row->id) }}" id="delete" data-name="{{ $row->state_name }}" class="btn btn-danger btn-sm" title="Delete Data">
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
                 <h3 class="box-title">Add States</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.state') }}" method="post">
                      @csrf

                      <div class="form-group">
                        <h5>Division<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="division_id" class="form-control">
                            <option value="" selected="" disabled>Select Division</option>
                            @foreach ($division as $row)
                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                            @endforeach
                          </select>
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                      <h5>District<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="district_id" class="form-control">
                          <option value="" selected="" disabled>Select District</option>
                     
                        </select>
                          @error('district_id')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                                  <div class="form-group">
                                      <h5>State Name<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="state_name" id="state_name" class="form-control" value="{{ old('state_name') }}">
                                          @error('state_name')
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
