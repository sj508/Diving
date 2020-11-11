 @include('layouts.header1')
 
 @if(!empty($getcustomer))
<section id="my-account">
   @if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  <div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="acc-sidebar">
        <div class="user-info"><img style="width: 50px; height: 50px;" src="{{ URL::to('images/avatar').$getcustomer->image}}"><h3>Dear</h3><h2>{{$getcustomer->name}}</h2>   </div>
        <ul>
             <li class="active"><a href="{{url('my_account')}}">My Profile</a></li>
              <li><a href="{{url('my_order')}}">My Order</a></li>

              <li>Account Setting
                <ul>
                  <li><a href="{{url('change_password')}}">Password Change</a></li>
                </ul>
              </li>
            <li><a href="{{url('cart')}}">My Cart</a></li>
                <li><a href="{{url('my_wish_list')}}">wish List</a></li>
          </ul>
         <a href="{{url('userlogout')}}" class="btn primary-btn">Logout</a>
      </div>
    </div>
    <div class="col-md-9">
      <div class="my-account-inner">
        <div id="basic_info">
                <form class="edit-phto" method="POST" action="{{url('change_password')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <input type="hidden" name="id" value="{{$getcustomer->id}}">

                  <div class="row">
                  <div class="col-md-6">
                    <h6>New Password</h6>
                    <div class="form-group">
                      <input type="password" placeholder="Eneter new password" name="password" class="form-control" required="">
                    </div>
                     @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                  </div>
                 
                </div>

                  <div class="row">
                  <div class="col-md-6">
                    <h6>Confirm Password</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Eneter Last name" name="cnf_password"  class="form-control" required="">
                    </div>
                      @if ($errors->has('cnf_password'))
                      <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
                      @endif
                  </div>
                 
                </div>

               
                <div class="row">
                  <div class="col-md-12 text-right">
                    
                    <button type="submit" class="btn primary-btn">Cancel</button>
                    <button type="submit" class="btn primary-btn">update</button>
                  
                  </div>
                </div>
             </form>
             </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endif 
@include('layouts.footer1')