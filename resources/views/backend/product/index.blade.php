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
                              <th>Qty</th>
                              <th>Price</th>
                              <th>Discount</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $row)
                              
                          
                          <tr>
                             <td><img src="{{ asset($row->product_thumbnail) }}" alt="" width="50px" height="50px"></td>
                             <td width="40%">{{ $row->product_name_ind }}</td>
                              <td width="10px">{{ $row->product_qty }}</td>
                              <td> {{ $row->selling_price }}</td>
                              <td> 
                              
                                @if($row->discount_price == NULL)
                                <span class="badge badge-pill badge-danger">No Discount</span>
                         
                                @else
                                @php
                                $amount = $row->selling_price - $row->discount_price;
                                $discount = $amount/$row->selling_price * 100;
                                $hasil = 100 - $discount;
                                @endphp
                                    <span class="badge badge-pill badge-danger">{{ round($hasil)  }} %</span>
                         
                                @endif
                              
                              </td>
                              <td> 
                                
                                @if ($row->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">InActive</span>
                                @endif
                              
                              </td>
                              <td width="30%">
                                <a href="{{ route('detail.product', $row->id) }}" class="btn btn-dark btn-sm"  title="Detail Data">
                                  <i class="fa fa-eye"></i>
                                </a> 
                                   <a href="{{ route('edit.product', $row->id) }}" class="btn btn-info btn-sm"  title="Edit Data">
                                    <i class="fa fa-pencil"></i>
                                  </a> 
                                    <a href="{{ route('delete.product', $row->id) }}" id="delete" data-name="{{ $row->product_name_ind }}" class="btn btn-danger btn-sm" title="Delete Data">
                                      <i class="fa fa-trash"></i>
                                    </a>

                                    @if ($row->status == 1)
                                    <a href="{{ route('inactive.product', $row->id) }}"  class="btn btn-warning btn-sm" title="InActive Now">
                                      <i class="fa fa-arrow-down"></i>
                                    </a> 
                                @else
                                <a href="{{ route('active.product', $row->id) }}" class="btn btn-success btn-sm" title=" Active Now">
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
