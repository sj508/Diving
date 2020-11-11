 @include('layouts.header1')
 <style>
   .cancel-date .red {
    color: #fb000a;
    font-size: 10px;
  }
 </style>
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
        <h2>My Order</h2>
        <div class="table-responsive">
         <table class="table table-bordered table-striped order-table">

           @if(!empty($orderdetail))
            @foreach($orderdetail as $list)
            <tr>
              <td><a href="{{url('product_detail/'.$list->pro_id)}}"><img src="{{url('/images/product/'.$list->image)}}"></a></td>
              <td>
                  <h4>{{$list->pro_name}}</h4>
                  <p>brand: {{$list->brand}}</p>
                   @if($list->type == 0)
                   <p>product type : Rent</p>
                   @else
                   <p>product type : Purchase</p>
                   @endif
 
              </td>
              <td>${{$list->pro_price}}</td>
              <td>
                <div class="deliver-date">
                  @if($list->status == 6)
                  <i class="fas fa-circle green"></i>  Delivered</div>
                <p>Your item has been Delivered</p>

               
                @elseif($list->status == 2)
                 <div class="deliver-date">
                <i class="fas fa-circle green"></i> Order Confirm </div>
                <p>Your item has been Confirm</p>

                @elseif($list->status == 3)
                 <div class="deliver-date">
                <i class="fas fa-circle green"></i> Pick-up</div>
                <p>Your item has been Pick-up</p>

                 @elseif($list->status == 4)
                <div class="process-date">
                <i class="fas fa-circle green"></i> In-Process</div>
                <p>Your item has been In-Process</p>

                @elseif($list->status == 5)
                 <div class="deliver-date">
                <i class="fas fa-circle green"></i> Shipped</div>
                <p>Your item has been Shipped</p>

                @else
                 <div class="cancel-date">
                 <i class="fas fa-circle red"></i> Cancel</div>
                <p>Your item has been Cancel</p>
                @endif


              </td>
            </tr>
            @endforeach
            @endif
        
        </table>
      </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endif 
@include('layouts.footer1')