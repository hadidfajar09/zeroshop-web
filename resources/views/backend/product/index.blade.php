@extends('admin.admin_master')

@section('title')
    All Products
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
                              <li class="breadcrumb-item"><a href="{{ route('all.product') }}"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Product</li>
                              <li class="breadcrumb-item active" aria-current="page">All Products</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Thumbnail</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $row)
                              
                          
                          <tr>
                             <td width="50px"><img src="{{ asset($row->product_thumbnail) }}" alt="" width="50px" height="50px"></td>
                             <td width="40%">{{ $row->product_name_ind }}</td>
                              <td width="10px">{{ $row->product_qty }}</td>
                              <td> <p>Rp. {{ $row->selling_price }}</p></td>
                              <td>
                                   <a href="{{ route('edit.product', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.subsubcategory', $row->id) }}" id="delete" data-name="{{ $row->product_name_ind }}" class="btn btn-danger btn-sm" title="Delete Data">
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
          <!-- /.col -->



          {{-- //add brand --}}

     
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

    <script type="text/javascript">
          $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
              var category_id = $(this).val();
              if(category_id){
                $.ajax({
                  url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                  type: "GET",
                  dataType: "json",
                  success:function(data){
                    var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key,value){
                          $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
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
