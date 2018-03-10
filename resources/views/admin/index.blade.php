@extends('admin.layouts.adminapp')

@section('content')
<div id="page-wrapper">
           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title"></h4> </div>
                   </div>
                       <div class="white-box">
                           <form class="form-horizontal form-material">
                               <center>
                                    <h3><i class="fa fa-user"style="font-size:48px;"></i>&nbsp;&nbsp;&nbsp;</li>

                                    <br><br>

                                    <font color="black" size="5">Welcome <br>{{ Auth::user()->name }}</font>
                                    <br>
                                    <font color="#627184" size="5">{{ Auth::user()->email }}</font>

                                    </h3>

                                </center>
                            </form>
                            <hr/>
                        </div>
                    </div>
                </div>
</div>
@endsection
