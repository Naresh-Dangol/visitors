  <?php $settings= App\Models\GlobalSetting::get();
    foreach($settings as $setting){
      //  $lo = $logo[0]['fav_icon'];
    }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Control Pannel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/font-awesome.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/select2.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/AdminLTE.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/_all-skins.min.css')!!}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{!!asset('css/ionicons.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/_all.css')!!}">
    <link rel="shortcut icon" href="{{asset('image/'.$setting->fav_icon)}}">

    @include('layouts.datatables_css')
    <style>
        .skin-blue .main-header .navbar {
                background-color:#DC143C;
        }

        .skin-blue .main-header .logo {
            background-color: #DC143C;
            color: #fff;
            border-bottom: 0 solid transparent;
        }
    </style>
    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
      

        <!-- Logo -->
        <a href="#" class="logo">
            <b>{{$setting->organisation_name}}</b>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            
            <center>  <span class="" style="color: #fff;position: absolute;top: 15px;font-size: 16px;left: 350px">आन्तरिक मामिला तथा कानुन मन्त्रालय कर्णाली प्रदेश l</span></center>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              
                <ul class="nav navbar-nav">
                    @if(Auth::user()->user_role !='super_admin')
                    <li class="dropdown notifications-menu">
                        <a href="data-count" class="dropdown-toggle" data-toggle="dropdown">
                          <i data-count="0" class="fa fa-bell-o"></i>
                          <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                          <li class="header">You have 10 notifications</li>
                      </ul>
                    <li>
                        @endif
                    
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">

                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset('image/'.$setting->logo)}}"
                                 class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset('image/'.$setting->logo)}}"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->name !!}
                                    <!-- <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small> -->
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!-- <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div> -->
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © 2018 <a href="http://radiantnepal.com" target="_blank">Radiant Nepal</a>.</strong> All rights reserved.
    </footer>

</div>


<!-- jQuery 3.1.1 -->
<script src="{!!asset('js/jquery.min.js')!!}"></script>
<script src="{!!asset('js/bootstrap.min.js')!!}"></script>
<script src="{!!asset('js/select2.min.js')!!}"></script>
<script src="{!!asset('js/icheck.min.js')!!}"></script>

<!-- AdminLTE App -->
<script src="{!!asset('js/app.min.js')!!}"></script>
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>

@include('layouts.datatables_js')


@yield('scripts')
</body>
</html>