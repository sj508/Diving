@include('layouts.header1')
<section class="default_container text-center">
   <div class="container">
    <div class="row text-center">
      <div class="thankyou-content" style="margin: 0 auto;">
        <h2 class="demo-title">Diving Membership</h2>
       </div>
     </div>

   <div class="row ">

  <div class="pricing-table">
@if(!empty($membership))
@foreach($membership as $key => $member)  
<?php 
$multi = array();
$multi =  explode(',', $member->benefit);
?> 
    <div class="ptable-item">
      <div class="ptable-single">
        <div class="ptable-header">
          <div class="ptable-title">
            <h2>{{$member->name}}</h2>
          </div>
          <div class="ptable-price">
            <h2><small>$</small>{{$member->price}}<span>/ {{$member->package_type}}</span></h2>
          </div>
        </div>
        <div class="ptable-body">
          <div class="ptable-description">
            <ul>
              @foreach($multi as $benefit) 
              <li>{{$benefit}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="ptable-footer">
          <div class="ptable-action">
           @if($user = Auth::guard('customer')->user())
            <a href="">Buy Now</a>
          @else
             <a data-toggle="modal" data-target="#login-users">Login Now</a>
           @endif
          </div>
        </div>
      </div>
    </div>
@endforeach
@endif
  </div>

   </div>
     </div>
 </section>


<!--MODAL -->
   <div class="modal fade" id="login-users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form class="form-horizontal" method="POST" action="{{url('users_login')}}">
               {{ csrf_field() }}
               <label>Username</label>
               <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Enter Username" required="">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <label>Password</label>
               <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
               </div>
               <div class="btn_panel text-center">
                  <input type="submit" value="submit" class="btn primary-btn">
                  <p>New Member ? <a href="{{url('registration')}}">Register Now</a> </p>                
               </div>
            </form>
      </div>
    </div>
  </div>
</div>
                                        
    <!--END MODAL -->

 
 @include('layouts.footer1')