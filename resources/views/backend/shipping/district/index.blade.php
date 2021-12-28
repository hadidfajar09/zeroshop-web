@extends('admin.admin_master')

@section('title')
    All District
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
                              <li class="breadcrumb-item" aria-current="page">District</li>
                              <li class="breadcrumb-item active" aria-current="page">District List</li>
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
                <h3 class="box-title">District List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Division</th>
                              <th>District</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($district as $row)
                              
                          
                          <tr>
                             <td>{{ $row['division']['division_name'] }}</td>
                              <td>{{ $row->district_name }}</td>
                              
                              <td width="20%">
                                   <a href="{{ route('edit.district', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.district', $row->id) }}" id="delete" data-name="{{ $row->district_name }}" class="btn btn-danger btn-sm" title="Delete Data">
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
                 <h3 class="box-title">Add District</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{ route('store.district') }}" method="post">
                      @csrf

                      <div class="form-group">
                        <h5>Division<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="division_id" class="form-control" aria-invalid="false">
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
                                      <h5>District Name<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="district_name" id="district_name" class="form-control" value="{{ old('district_name') }}">
                                          @error('district_name')
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
