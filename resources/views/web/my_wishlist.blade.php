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
        <?php $count = count($getwishlist); ?>

        <h2>My Wishlist ({{$count}})</h2>
        <div class="table-responsive">
         <table class="table table-bordered table-striped order-table">
           @if(!empty($getwishlist))
            @foreach($getwishlist as $key => $wishlist)
            <tr>
              <td style="width: 150px;"><a href="{{url('product_detail/'.$wishlist->pro_id)}}"><img src="{{url('/images/product/'.$wishlist->image)}}"></a></td>
              <td>
              <h4><a href="{{url('product_detail/'.$wishlist->pro_id)}}">{{$wishlist->pro_name}}</a></h4>
                 <h5>${{$wishlist->pro_price}}</h5>
              </td>
              <td><a href="{{url('delete_wishlist/'.$wishlist->id)}}"><i class="fas fa-trash"></i> </a></td>
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