@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Products details</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Flash successfull Message Start -->
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
                            <em> {!! session('flash_message') !!}</em>
                        </div>
                    @endif
                    <!-- Flash successfull message End -->
                        <br>
                        <div class="white-box">
                        <form  class="form-horizontal form-material" method="post" action="{{ url('admin/product/deleteall')}}">
                            {{ csrf_field() }}
                            <a class="btn btn-custom" href="{{ url('admin/product/create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Products</a>

                            <button type="submit"class="btn btn-danger waves-effect waves-light deleteText" >Delete All Selected</button>
                            <br><hr>

                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>All<INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product code</th>
                                            <th>Description</th>
                                            <th>New Arrivals</th>
                                            <th>Category</th>
                                            <th>Company</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <!-- @foreach($products as $product)
                                            <tr >
                                                <td>
                                                    <INPUT type="checkbox" name="delete_id[]"  value="{{$product->id}}" />
                                                </td>

                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $product->name }}</td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ ( $product->new_arrivals == 0 )? "no" : "yes" }}</td>
                                                <td>{{(isset( $product->category->name ))? $product->category->name : ""}}</td>
                                                <td>{{(isset( $product->company->name ))? $product->company->name : ""}}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit/' . $product->id) }}"class="btn btn-success btn-xs" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                                    <a id="delete-button" href="{{ url('admin/product/delete/' . $product->id) }}" class="btn btn-danger btn-xs waves-effect waves-light deleteText"> <i class="glyphicon glyphicon-trash"></i>  Delete</a>
                                                </td>



                                            </tr>
                                        @endforeach -->
                                    </tbody>
                                </table>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
<script>
    function checkAll(ele)
     {
        var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++)
                 {
                    if (checkboxes[i].type == 'checkbox')
                     {
                        checkboxes[i].checked = true;
                    }
                }
            }
            else
             {
                 for (var i = 0; i < checkboxes.length; i++)
                  {
                     console.log(i)
                     if (checkboxes[i].type == 'checkbox')
                      {
                         checkboxes[i].checked = false;
                       }
                   }
               }
           }

</script>

@section('javascript')

<script>
$(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('admin/product/DataTable') !!}',
        columns: [
            { data: 'check', 'orderable': false, 'searchable':false, 'name':'id' },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'product_code', name: 'product_code' },
            { data: 'description', name: 'description' },
            { data: 'new_arrivals', name: 'new_arrivals' },
            { data: 'category', name: 'category' },
            { data: 'company', name: 'company_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endsection
