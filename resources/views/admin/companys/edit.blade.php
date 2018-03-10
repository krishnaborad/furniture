@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Edit Company</h4> </div>
                   </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                        <div class="white-box">
                        <form class="form-horizontal form-material" action="" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="post_title">Company Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $company->name }}" ><br>
                                </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Update Company  </button>

                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
