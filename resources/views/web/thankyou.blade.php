@include('layouts.header1')

<section class="default_container text-center">
   <div class="container">
    <div class="thankyou-img " ><img src="{{ URL::to('public/images/giphy.gif')}}" width="500px"></div>
    <div class="thankyou-content">
      <h3>Thank you</h3>
      <h4>your order was completed successfuly</h4>
      <h5>For More Info visit our pages</h5>
      <div class="Login_outer">
        <a href="#" class="signin-btn fb"><i class="fab fa-facebook-f"></i> Login with Facebook</a>
        <a href="#" class="signin-btn google"><i class="fab fa-google-plus-g"></i> Login with Google +</a>
      </div>
    </div>
   </div>
 </section>

 @include('layouts.footer1')