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
                  <div class="change-photo">
                  <figure><img style="width: 150px; height: 150px; "src="{{ URL::to('images/avatar').$getcustomer->image}}" alt=""></figure>
                  <div class="edit-img">
                    
                <form class="edit-phto" method="POST" action="{{url('my_account')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{$getcustomer->id}}">

                      <label class="fileContainer">
                        <i class="fa fa-camera-retro"></i>
                        Chage Profile Picture
                      <input type="file" name="img" value="{{$getcustomer->image}}">
                      </label>
                   
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <h6>First Name</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Enter name" name="name" value="{{$getcustomer->name}}" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h6>Last Name</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Eneter Last name" name="last_name" value="{{$getcustomer->last_name}}" class="form-control" required="">
                    </div>
                  </div>
               
               
                  <div class="col-md-6">
                    <h6>Email Address</h6>
                    <div class="form-group">
                      <input type="email" placeholder="Enter email" name="email" value="{{$getcustomer->email}}" class="form-control" required="">
                    </div>
                  </div>
            
                     <div class="col-md-6">
                    <h6>Mobile Number</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Enter Mobile no." name="mobile" value="{{$getcustomer->mobile}}" class="form-control" required="">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <h6>Street</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Enter address." name="address" value="{{$getcustomer->address}}" class="form-control" required="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h6>Area</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Enter Area" name="city" value="{{$getcustomer->city}}" class="form-control" required="">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <h6>Zip Code</h6>
                    <div class="form-group">
                      <input type="text" placeholder="Enter Area" name="zip_code" value="{{$getcustomer->zip_code}}" class="form-control" required="">
                    </div>
                  </div>

                   <div class="col-md-6">
                    <h6>Date Of Birth</h6>
                    <div class="form-group">
                      <input type="date" placeholder="Date Of Birth" name="dob" value="{{$getcustomer->dob}}" id="datepicker" class="form-control hasDatepicker" required="">
                    </div>
                     @if ($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                    @endif
                  </div>

                   </div>
                
                
                 
                
                <div class="row">
                  <div class="col-md-12">
                    <h6>Gender</h6>
                    <div class="form-group">
                      <div class="form-radio">
                        <div class="radio">
                        <label>
                      
                          <input type="radio" name="gender" value="Male" {{ $getcustomer->gender == 'Male' ? 'checked' : '' }}><i class="check-box"></i>Male
                        </label>
                        </div>

                        <div class="radio">
                        <label>
                          <input type="radio" name="gender" value="Female" {{ $getcustomer->gender == 'Female' ? 'checked' : '' }}><i class="check-box"></i>Female
                        </label>
                        </div>

                        <div class="radio">
                        <label>
                          <input type="radio" name="gender" value="Other" {{ $getcustomer->gender == 'Other' ? 'checked' : '' }}><i class="check-box"></i>other
                        </label>
                        </div>
                          
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12 text-right">
                    
                    <button type="submit" class="btn primary-btn">Cancel</button>
                    <button type="submit" class="btn primary-btn">Save</button>
                  
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