@extends('admin.layouts.adminapp')
@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Profile</h4> </div>
                   </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <br>
            <div class="white-box">
                    <form class="form-horizontal form-material" method="get" action="">

                        <table class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>{{ Auth::user()->name }}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>{{ Auth::user()->email }}</th>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <th><a href="{{ url('admin/profile_edit/reset')}}" class="buttons"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Reset password</a></th>
                                </tr>
                            </thead>
                        </table>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection
