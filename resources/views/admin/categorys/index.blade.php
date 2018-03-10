@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Categorys details</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Flash Success Message start -->
                    @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                    @endif

                    <!-- Flash success message end -->

                 <div class="white-box">
                    <form class="form-horizontal form-material" method="post" for="cat" action="{{ url('admin/category/deleteall')}}">{{ csrf_field() }}
                        <p>
                        <a class="btn btn-custom" href="{{ url('admin/category/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add New Category</a>
                            <button type="submit"class="btn btn-danger waves-effect waves-light deleteText" >Delete All Selected</button>
                    <br> <hr>
                    <table class="table table-bordered table-striped datatable" id="table">
                        <thead>
                            <tr>
                                <th>All <br> <INPUT type="checkbox" name="chb[]" onchange="checkAll(this)" /></th>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Company</th>
                                <!-- <th>theme</th> -->
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--@foreach($categorys as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{(isset( $category->company->name ))? $category->company->name : ""}}</td>
                                <td>{{(isset( $category->company->theme ))? $category->company->theme : ""}}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/category/edit/' . $category->id) }}"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                    <a href="{{ url('admin/category/delete/' . $category->id)}}"class="btn btn-danger waves-effect waves-light deleteText" >
                                    <i class="fa fa-trash-o" aria-hidden="true" ></i>  Delete</a>
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
<script type="text/javascript">

    $(document).ready(function() {
    $('#table').DataTable();
    } );

</script>
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
        ajax: '{!! url('admin/category/DataTable') !!}',
        columns: [
            { data: 'check', 'orderable': false, 'searchable':false, 'name':'id' },

            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'company', name: 'company_id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endsection
