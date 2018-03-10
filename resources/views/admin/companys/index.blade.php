@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Companys details</h4> </div>
                   </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    @if ($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Flash successfull Message Start -->
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                    @endif
                    <!-- Flash successfull Message End -->
                    <div class="white-box">
                    <form  class="form-horizontal form-material">
                    <a class="btn btn-custom" href="{{ url('admin/company/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                        Add New Company</a>
                    <br> <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Company</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach($companys as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/company/edit/' . $company->id) }}"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>

                                        <a href="{{ url('admin/company/delete/' . $company->id)}}"class="btn btn-danger waves-effect waves-light deleteText" >
                                        <i class="fa fa-trash-o" aria-hidden="true" ></i>  Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>

@endsection
