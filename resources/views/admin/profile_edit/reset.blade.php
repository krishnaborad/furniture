@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Reset Password</h4> </div>
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
                <!-- altttttttttt -->


                <div class="white-box">
                    <form  class="form-horizontal form-material" method="post">
                    {{ csrf_field() }}

                            <div class="form-group col-md-8 " {{ $errors->has('old_password') ? ' has-error' : 'enter' }} >
                                <label for="post_title">Enter Your Current Password :</label>
                                <input id="password" placeholder="Enter your Current Password" type="password" class="form-control form-control-line" name="old_password"> <br>

                            </div>
                            <div class="form-group col-md-8 " {{ $errors->has('password') ? ' has-error' : 'enter' }} >
                                <label for="post_title">Enter Your New Password :</label>
                                <input id="password" placeholder="Enter Your New password" type="password" class="form-control" name="password" > <br>

                            </div>
                            <div class="form-group col-md-8 " {{ $errors->has('new_password') ? ' has-error' : 'enter' }} >
                                <label for="post_title">Re-enter Your New Password :</label>
                                <input id="password" placeholder="Re-type Your New Password" type="password" class="form-control" name="password_confirmation" > <br>

                            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                update password</button>
                                <br><br><br>
                        </form>
            </div>

        </div>
    </div>
</div>
@endsection
