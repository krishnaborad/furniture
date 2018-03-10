@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">add new company</h4> </div>
                   </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                         <font color="red" size="4">*required field.</font>
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="white-box">
                        <form class="form-horizontal form-material" action="" method="post">
                                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="post_title">company Name <font color="red" size="5">*</font> </label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Company Name"><br>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Company</button>

                    </form>

            </div>
        </div>
    </div>
</div>

@endsection
