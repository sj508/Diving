@include('layouts.header1')
<section id="register_panel">
 	<div class="container">
 		<div class="breadcrumbs"><ul><li><a href="{{url('/')}}">Home</a> </li><li>Forgot Password</li></ul></div>
 		<h2>Forgot Password</h2>
 		<div class="registration_form">
 			<div class="row">
        <div class="col-md-6">
          <img src="{{ URL::to('public/images/giphy.gif')}}">
        </div>
        <div class="col-md-6">
          <h3>Forgot Password</h3>
          <p>Enter your email and we'll send you a link to reset your password</p>
          <div class="form-group">
            <input type="email" name="" class="form-control" placeholder="Enter Email Address">
          </div>
           <div class="form-group">
            <input type="submit" name="" class="default-btn1" value="Submit" placeholder="Enter Email Address">
          </div>
        </div>
      </div>
 			</div>
 		</div>
 	</div>

 </section>
 @include('layouts.footer1')