<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin : Diving</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ URL::to('images/logos.png')}}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ URL::to('css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/unix.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/style.css')}}" rel="stylesheet">

    <link href="{{ URL::to('css/lib/calendar/fullcalendar.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('css/dataTables.bootstrap.min.css')}}">
    <link href="{{ URL::to('css/editor.css')}}" type="text/css" rel="stylesheet"/>
    
</head>

<body>

    <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    @php
                    $user = Auth::guard('web')->user();
                    $user_type = $user->user_type;
                   @endphp

                    @if($user_type == 1)
                     <li class="label">
                        
                        <div class="user_info">
                            <img style="border-radius: 57%;" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="">
                            <div class="user_name">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p>Tranner</p>
                            </div>
                        </div>
                    </li>
                    <li class="label2">
                        <img style="border-radius: 57%;" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="">
                    </li>
                    <li><a href="{{url('home')}}"><i class="ti-home"></i>Dashboard</a>
                    </li>
                    <li><a href="{{url('my_classes')}}"><i class="ti-calendar"></i>My Classes</a></li>
                     <li><a href="{{url('accessories')}}"><i class="ti-calendar"></i>Request For Accessories</a></li>
                    @else
                    <li class="label">
                        
                        <div class="user_info">
                            <img style="border-radius: 57%;" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="">
                            <div class="user_name">
                                <h4>{{ Auth::user()->name }}</h4>
                                @if(Auth::user()->user_type == 0)
                                <p>Super Admin</p>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="label2">
                        <img style="border-radius: 50%;" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="">
                    </li>
                    <li><a href="{{url('home')}}"><i class="ti-home"></i> Dashboard</a>
                    </li>
                    <li><a href="{{url('user')}}"><i class="ti-user"></i>User List</a></li>

                    <li><a href="{{url('courses')}}"><i class="ti-calendar"></i>Courses Management</a></li>

                         <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i>Tour Management<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{url('tour')}}">View Tour</a></li>
                             <li><a href="{{url('addtour')}}">Add Tour</a></li>
                            <li><a href="{{url('tour_request')}}">Tour Request</a></li>
                
                        </ul>
                    </li>


                      <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i>Class Management<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{url('classes')}}">View Classes</a></li>
                            <li><a href="{{url('get_request')}}">Request Accessories</a></li>
                
                        </ul>
                    </li>


                     <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i>Boat Management<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{url('boat')}}">View Boat</a></li>
                            <li><a href="{{url('add_boat')}}">Add Boat</a></li>

                
                        </ul>
                    </li> 


                      <!-- <li><a href="{{url('tour')}}"><i class="ti-calendar"></i>Tour Management</a></li> -->

                    <li><a href="{{url('customer')}}"><i class="ti-user"></i>Customer Information</a></li>

                    <li><a href="{{url('product')}}"><i class="ti-layout-grid2-alt"></i>Product Management</a></li>

                     <li><a class="sidebar-sub-toggle"><i class="ti-shopping-cart-full"></i>Order Management<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{url('order')}}">Order detail</a></li>
                
                        </ul>
                    </li>

                     <li><a href="{{url('finance')}}"><i class="ti-wallet"></i>Payment detail</a></li>

                    <li><a href="{{url('certification')}}"><i class="ti-receipt"></i>Certification Agency</a></li>


                         <li><a class="sidebar-sub-toggle"><i class="ti-star"></i>Membership<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="{{url('packages')}}">Packages</a></li>
                             <li><a href="{{url('benefit')}}">Benefit Package</a></li>
                          
                        </ul>
                    </li>


                     <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Store Management<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="{{url('store')}}">View Store</a></li>
                             <li><a href="{{url('add_store')}}">Add Store</a></li>
                          
                        </ul>
                    </li>

                     <li><a class="sidebar-sub-toggle"><i class="fa fa-users"></i>Our Team<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="{{url('our_team')}}">View Team</a></li>
                             <li><a href="{{url('add_team')}}">Add Team</a></li>
                          
                        </ul>
                    </li>

                     <li><a class="sidebar-sub-toggle"><i class="ti-settings"></i>Web Setting<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="{{url('banner')}}">View Page Banner</a></li>
                             <li><a href="{{url('add_banner')}}">Add Page Banner</a></li>
                             <li><a href="{{url('add_client')}}">Our Client</a></li>
                             <li><a href="{{url('advertisement')}}">View Advertisement</a></li>
                             <li><a href="{{url('add_advertisement')}}">Add Advertisement</a></li>
                             <li><a href="{{url('web_content')}}">website Content</a></li>
                              <li><a href="{{url('add_gallery')}}">Gallery</a></li>

                
                        </ul>
                    </li>

                     <li><a class="sidebar-sub-toggle"><i class="ti-settings"></i>Setting<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{url('permision')}}">Permission</a></li>
                
                        </ul>
                    </li>

                    <li><a href="{{url('view_subscribe')}}"><i class="ti-bell"></i>Subscribe</a></li>

                   
                @endif
                </ul>
            </div>
        </div>
    </div>
<!-- /# sidebar -->


    <div class="header" id="change_me">
        <div class="pull-left">
           <div class="logo"><a href="#"><img src="{{ URL::to('images/logos.png')}}"></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
                
        
                <li class="header-icon dib">
                    <img class="avatar-img" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="" /> <span class="user-avatar"> {{ Auth::user()->name }} <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                       
                        <div class="dropdown-content-body">
                            <ul>
                               
                                <li><a href="{{url('profile')}}"><i class="ti-user"></i> <span>Profile</span></a></li>
                                
                                <li><a href=""><i class="ti-settings"></i> <span>Setting</span></a></li>
                    
                            <li><a href="{{ url('/admin/logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a>
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                                </form>
                            </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
  <!--    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div> -->
   

   <style>
       .user_info {
            margin: 20px 0;
        }
       .sidebar-hide .sidebar.sidebar-hide-to-small .nano-content > ul {
            width: 20px;
        }
        .sidebar-hide .sidebar.sidebar-hide-to-small{
            top: 0px;
        }
        .sidebar .nano-content > ul li.label{
            line-height: 15px;
        }
        .header {
            z-index: 9999 !important;
            padding-left: 0;
            border-top: 2px solid #D6050D;
            background: transparent !important;
        }
        .sidebar .nano > .nano-content{
            top: 100px;
        }
        .hamburger.is-active .line:nth-child(1){
            background: #fff;
        }
        .hamburger.is-active .line:nth-child(2){
           background: #fff; 
        }
        .hamburger.is-active .line:nth-child(3){
           background: #fff; 
        }
        .hamburger {
            vertical-align: top;
        }
        .label2{
            display: none;
        }
        .sidebar-hide .label2 {
            display: block !important;
            position: absolute !important;
            top: -40px;
            width: 30px;
            height: 30px;
            left: -6px;
        }
   </style>
