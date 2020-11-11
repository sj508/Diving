@include('layouts.header1')

<section id="register_panel">
 	<div class="container">
 		<div class="breadcrumbs"><ul><li><a href="{{url('/')}}">Home</a> </li><li>Forgot Password</li></ul></div>
    
     @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
     @endif

 		<h2>Forgot Password</h2>
 		<div class="registration_form">
      <form method="POST" action="{{url('post_rest_password')}}" enctype="multipart/form-data">
        {{ csrf_field() }} 
 			<div class="row">
        <div class="col-md-6">
          <img src="{{ URL::to('public/images/giphy.gif')}}">
        </div>
        <div class="col-md-6">
          <h3>Forgot Password</h3>
          <p>Enter your email and we'll send you a link to reset your password</p>
          <div class="form-group">
            <input type="hidden" name="check_email" value="{{$detail[0]->email}}">
             <input type="email" name="email" class="form-control" placeholder="Enter Email" required autofocus>
             @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
             <br>
            <input id="password" minlength="6" type="password" name="password" class="form-control" placeholder="Enter New Password" required="">
             @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <br>
            <input type="password" name="cnf_password" class="form-control" placeholder="Enter Confirm Password" required="">
             @if ($errors->has('cnf_password'))
            <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
            @endif
           
          </div>
           <div class="form-group">
            <input type="submit" name="" class="default-btn1" value="Submit">
          </div>
        </div> 
      </div>
    </form>
 			</div>
 		</div>
 	</div>

 </section>
 @include('layouts.footer1')