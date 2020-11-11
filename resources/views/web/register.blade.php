@include('layouts.header1')



 <section id="register_panel">
   <div class="container">
      <div class="breadcrumbs">
         <ul>
            <li><a href="#">Home</a> </li>
            <li>Registration</li>
         </ul>
      </div>
      <h2>Registration</h2>
        @if (Session::has('message'))
           <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

       <form class="form-horizontal" method="POST" action="{{url('post_registration')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

      <div class="registration_form">
         <div class="reg_social"><a href="#" class="signin-btn fb"><i class="fab fa-facebook-f"></i> Login with Facebook</a> <a href="#" class="signin-btn google"><i class="fab fa-google-plus-g"></i> Login with Google +</a>
         </div>
         <p>or</p>
         <div class="row">
            <div class="col-lg-12 upload_img_outer">
               <label>Profile Picture</label>
               <div class="upload_img">
               	<input type="file" name="img" required=""><i class="fa fa-plus"></i> <span>Upload img</span>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <h3>Persnoal Detail</h3>
            </div>
            <div class="col-lg-6">
               <label>First Name *</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="name" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Last Name *</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="last_name" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Email Address *</label>
               <div class="form-group">
                  <input type="email" class="form-control" name="email" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Mobile Number *</label>
               <div class="form-group">
                  <input type="tel" class="form-control" name="mobile" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Password</label>
               <div class="form-group">
                  <input type="password" class="form-control" name="password" required="">
               </div>
                @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
                 @endif
            </div>

            <div class="col-lg-6">
               <label>confirm Password</label>
               <div class="form-group">
                  <input type="password" class="form-control" name="cnf_password" required="">
               </div>
                @if ($errors->has('cnf_password'))
                 <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
                 @endif
            </div>

            <div class="col-lg-12">
               <h3>Address</h3>
            </div>
            <div class="col-lg-6">
               <label>Street</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="address" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Area</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="city" required="">
               </div>
            </div>
            <div class="col-lg-6">
               <label>Zipcode</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="zip_code" required="">
               </div>
            </div>
            <div class="col-lg-12">
               	<input type="submit" class="btn primary-btn">
            </div>
         </div>
      </div>
  </form>
  
   </div>
</section>

 @include('layouts.footer1')