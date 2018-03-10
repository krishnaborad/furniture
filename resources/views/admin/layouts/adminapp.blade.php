
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Furniture</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Menu CSS -->
    <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet"/>
    <!-- toast CSS -->
    <link href="{{ asset('plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <!-- morris CSS -->
    <link href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet"/>

    <!-- chartist CSS -->
    <link href="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet"/>

    <!-- <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet"/> -->
    <!-- datatable CSS -->
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet"/>


    <link href="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet"/>

    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alertBox.css') }}" rel="stylesheet"/>

    <!-- color CSS -->
    <link href="{{ asset('css/colors/default.css') }}"  id="theme" rel="stylesheet"/>


</head>
<body class="fix-header">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{ url('#')}}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <img src="{{ asset('plugins/images/admin-logo.png') }}" alt="home" class="dark-logo" />
                        <img src="{{ asset('plugins/images/admin-logo-dark.png') }}" alt="home" class="light-logo" />
                     </b>

                     <span class="hidden-xs">
                        <!--This is dark logo text-->
                        <img src="{{ asset('plugins/images/admin-text.png') }}" alt="home" class="dark-logo" />
                        <!--This is light logo text-->
                        <img src="{{ asset('plugins/images/admin-text-dark.png') }}" alt="home" class="light-logo" />
                     </span> </a>
                </div>

                <!-- Admin -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a href="{{ url('admin/profile')}}" class="profile-pic"><b class="hidden-xs">{{ Auth::user()->name }}</b></a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- Moduals Start  -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{ url('admin')}}" class="buttons"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <?php
                        $company = App\setting::where('key','company_options')->first();
                    ?>
                    @if($company->value==1)
                    <li>
                        <a href="{{ url('admin/companys')}}" class="buttons"><i class="fa fa-clone -o fa-fw" aria-hidden="true"></i>Company</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('admin/categorys')}}" class="buttons"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/products')}}" class="buttons"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Product</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/profile_edit/reset')}}" class="buttons"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Reset password</a>
                    </li>

                    <!-- <li>
                        <a href="{{ url('admin/userdata')}}" class="buttons"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
                    </li> -->

                    <!-- <li>
                        <a href="{{ url('admin/contact')}}" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Contact Us</a>
                    </li> -->

                </ul>

                <div class="center p-20">
                     <a href="{{ route('logout') }}" class="btn btn-danger btn-block waves-effect waves-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                     </form>
                 </div>
            </div>
        </div>
        <!-- Moduals End -->

        @yield('content')
        <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        <!-- All Jquery -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/dashboard1.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
        <script src="{{ asset('js/dropzone.js') }}"></script>



        @yield('javascript')

        <!-- Delete popup Key -->
        <script>
        $(document).ready(function(){
          $(".deleteText").click(function(){
            if (!confirm("Do you want to delete ?")){
              return false;
            }
          });
        });
        </script>

        <!-- Flash Message Script -->
        <script>
            $('#flash-overlay-modal').modal();
        </script>

</body>

</html>
