<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ URL::to('images/logos.png')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/jquery.fancybox.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/flexslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/packages.css')}}">
<script type="text/javascript" src="{{ URL::to('public/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/popper.min.js')}}" ></script>
<script type="text/javascript" src="{{ URL::to('public/js/bootstrap.min.js')}}"></script>




<title>Diving web</title>
</head>
<body>
  <style>
    .avatar-img {
  border-radius: 100px;
  width: 25px;
  position: relative;
  top: -3px;
}

  </style>
<header>
   <div class="top_header">
      <div class="container">
         <div class="row">
            <div class="col-lg-3">
               <a href="{{url('/')}}" class="logo"><img src="{{ URL::to('public/images/logo.png')}}" width="150px"/></a>
            </div>
            <div class="col-lg-9">
               <ul>
                  @if($user = Auth::guard('customer')->user())
                  <li><a href="{{url('cart')}}"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                  @else
                    <li><a data-toggle="modal" data-target="#login-user"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                  @endif
                  <li class="dropdown">
                     <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     @if($user = Auth::guard('customer')->user())
                     @if($user->google_id)
                      <img class="avatar-img" src="{{$user->image}}" alt="" />
                     {{ $user->name }}
                     @else
                     <img class="avatar-img" src="{{ URL::to('images/avatar').$user->image}}" alt="" />
                     {{ $user->name }}
                      @endif
                    <!--  <div class="dropdown-menu dropdown-menu-right logout-btn" aria-labelledby="dropdownMenuLink">
                       <a class="logout" href="{{url('userlogout')}}"><i class="fa fa-power-off"></i> Logout</a>
                        
                     </div> -->
                      
                     @else
                     <i class="far fa-user-circle"></i> User
                     </a>


                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <h2>Sign In</h2>
                        <div class="sign-form">
                           <form class="form-horizontal" method="POST" action="{{url('users_login')}}">
                              {{ csrf_field() }}
                              <label>Username</label>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="email" placeholder="Enter Username">
                                 @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                              </div>
                              <label>Password</label>
                              <div class="form-group">
                                 <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                 @if ($errors->has('password'))
                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                              </div>

                <label for="checkboxes-0">
                    <input id="checkboxes-0" type="checkbox" required tabindex="16"> &nbsp;I have read and agree to all<span>
                    <a href="{{url('terms')}}">Terms and conditions</a></span> and <span><a href="{{url('privacy_policy')}}">privacy policy</a></span>.
                </label>
                      
                            

                              <div class="form-group text-right">
                                 <a href="{{url('forgot_password')}}" style="font-size: 13px;color: #ed1c24;font-weight: 400;text-decoration: underline;">Forgot Password?</a>
                              </div>
                              <div class="btn_panel text-center">
                                 <input type="submit" value="submit" class="btn primary-btn">
                                 <p>or</p>
                                 <a href="{{url('/login/facebook')}}" class="signin-btn fb">
                                 <i class="fab fa-facebook-f"></i> Login with Facebook</a>

                                 <a href="{{url('login/google')}}" class="signin-btn google">
                                 <i class="fab fa-google-plus-g"></i> Login with Google +</a>
                                 
                                 <p>New Member ? <a href="{{url('registration')}}">Register Now</a>
                                 </p>
                              </div>
                           </form>
                        </div>
                     </div>
                  </li>
                  @endif
                  @if($user = Auth::guard('customer')->user())
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle" role="button" id="dropdownmyaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownmyaccount">
                  <a class="dropdown-item" href="{{url('my_account')}}"><i class="fa fa-user"></i>My Profile</a>
                  <a class="dropdown-item" href="{{url('my_order')}}"><i class="fa fa-list-alt"></i>My Order</a>
                  <a class="dropdown-item" href="{{url('my_wish_list')}}"><i class="fa fa-heart"></i>Wish List</a>
                  <a class="dropdown-item" href="{{url('userlogout')}}"><i class="fa fa-power-off"></i> Logout</a>
                 </div>
               </li>
               @endif

               </ul>
               <div class="search_bar"><input type="text" class="form-control" name="" placeholder="Type in and Hit Enter"> <a href="#"><i class="fas fa-search"></i></a></div>
            </div>
         </div>
      </div>
   </div>
</header>
 
<nav class="navbar navbar-expand-lg sticky-top" id="navbar_top">
  <div class="container">
  
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-trigger="#main_nav">
    <span class="navbar-toggler-icon"><img src="images/menu.png"></span>
  </button>

  <div class=" navbar-collapse" id="main_nav">
  <div class="offcanvas-header mt-3">  
      <button class="btn btn-outline-danger btn-close float-right"> &times Close </button>
      <h5 class="py-2 text-white">Main navbar</h5>
    </div>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{url('/')}}">welcome </a></li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="{{url('about_us')}}"> About us</a>
    	<ul>
    		<li><a href="{{url('team')}}">Our Team</a></li>
    		<li><a href="{{url('membership_plan')}}">Our Club Membership</a></li>
        <li><a href="{{url('gallery')}}">Gallery</a></li>
    	</ul>
    </li>

     <li class="nav-item"><a class="nav-link" href="{{url('boat_list')}}">Boat </a></li>
     <li class="nav-item"><a class="nav-link" href="{{url('courses_list')}}">Diving Courses </a></li>
    <li class="nav-item dropdown"><a class="nav-link" href="{{url('tour_list')}}"> tour </a>
    	
    </li>
     <li class="nav-item"><a class="nav-link" href="{{url('product_listing')}}">store </a></li>
     <li class="nav-item"><a class="nav-link" href="{{url('contact_us')}}">Contact Us</a></li>
      <li class="nav-item"><a class="nav-link btn primary-btn" href="{{url('membership_plan')}}"> become club member </a></li>

  </ul>
  </div> <!-- navbar-collapse.// -->

</div><!-- container //  -->
</nav>

<style>
  .logout-btn::after {
    display: none !important;
  }
  .logout{
    text-align: center;
  }
  .logout-btn{
    transform: translate3d(-100px, 23px, 0px) !important;
  }
  
</style>