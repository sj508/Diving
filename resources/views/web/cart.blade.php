@include('layouts.header1')
<style>
  .icon_image{
    
     height: 53px;
    width: 63px;
}
.qtySelector{
  border: 1px solid #ddd;
  width: 107px;
  height: 35px;
  margin: 10px auto 0;
}
.qtySelector .fa{
  padding: 10px 5px;
  width: 35px;
  height: 100%;
  float: left;
  cursor: pointer;
}
.qtySelector .fa.clicked{
  font-size: 12px;
  padding: 12px 5px;
}
.qtySelector .fa-minus{
  border-right: 1px solid #ddd;
}
.qtySelector .fa-plus{
  border-left: 1px solid #ddd;
}
.qtySelector .qtyValue{
  border: none;
  padding: 5px;
  width: 35px;
  height: 100%;
  float: left;
  text-align: center
}
.qtyValue {
    width: 30px !important;
    height: 30px !important;
}

</style>

<section id="banner_outer" class="inner_page_banner">
 	<div id="demo" class="carousel slide" data-ride="carousel">
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ URL::to('public/images/about-banner.jpg')}}" alt="" >
      <div class="carousel-caption">
        <h3>Cart</h3>
        <p>    Home >  Cart</p>
      </div>   
    </div>
   
    
  </div>
  
</div>
 </section>

<section class="cart-area ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
           <form method="POST" action="{{url('check_out')}}" enctype="multipart/form-data">
               {{ csrf_field() }}

              <div class="cart-wraps">
                <div class="cart-table table-responsive">
                  <table class="table table-bordered">

                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>

                    <tbody>

                       <?php if($getcart){ 
                           $i =1;
                  foreach($getcart as $cartlist){ 
                            { ?>

                      <tr>
                        <td class="product-thumbnail">
                          <a href="#">
                            <img class="icon_image" src="images/product/{{ $cartlist->image }}" alt="Image">
                          </a>
                        </td>

                        <td class="product-name">
                          <a>{{$cartlist->name}}</a>
                                                </td>
                                                
                        <td class="product-price">
                          <span class="unit-amount" id="unit_p">${{$cartlist->unit_price}}</span>
                        </td>

                        <td class="product-quantity">

                          <div class="input-counter">
                            <div class="qtySelector text-center">
                              <i class="fa fa-minus decreaseQty" id="decreaseQty"></i>
                              <input type="text" class="qtyValue" value="{{$cartlist->quantity}}" id="{{$cartlist->id}}" name="quantity" />
                              <i class="fa fa-plus increaseQty" id="increaseQty"></i>
                            </div>
                          
                        </div>
                        <input type="hidden" id="card_id" value="{{$cartlist->id}}" name="card_id" />
                        </td>


                        <td class="product-subtotal">
                          <span class="subtotal-amount">${{$cartlist->total_price}}</span>
                          <a href="{{url('delete_cart/'.$cartlist->id)}}" class="remove">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>


                     <?php  $i++;}}} ?>
                    </tbody>
                  </table>

                </div>

                

                <div class="cart-buttons">
                  <div class="row align-items-center">
                    <div class="col-lg-7 col-sm-7 col-md-7">
                      <div class="continue-shopping-box">
                        <a href="{{url('product_listing')}}" class="default-btn1">
                          Continue Shopping
                        </a>
                      </div>
                    </div>


                    <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                      {{ csrf_field() }}

                      <a href="#" class="default-btn1 updatecart">
                        Update Cart
                      </a>
                    </div>


                  </div>
                </div>
            </div>
                            
              <div class="row">
                <div class="col-lg-6">
                  <div class="cart-calc">
                    <div class="shops-form"> 
                      <h3>Calculate Shipping</h3>
                     
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Coupon Code">
                      </div>
                      <a href="#" class="default-btn1">
                        Apply Coupon
                      </a>
                    </div>
                  </div>
                                </div>
                                
                <div class="col-lg-6">
                  <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <ul>
                      <li>Subtotal <span>${{$subtotal}}</span></li>
                      <li>Shipping <span>$30.00</span></li>
                      <li>Coupon <span>$20.00</span></li>
                      <?php 
                        $total = $subtotal + '30' + '20';
                      ?>
                      <li>Total <span><b>${{$total}}</b></span></li>
                    </ul>

                      
                   
                    <input type="radio" id="Delivery" name="option" value="Delivery">
                    <label for="Delivery">Delivery Request</label>
                    <input type="radio" id="Pick-up" name="option" value="Pick-up">
                    <label for="Pick-up">Pick-up Request</label>
                    <p style="color: red;"> </p>

                    <h5 style="display: none;">Diving Store</h5>
                    <table class="table table-bordered" id="show_store" style="display: none;">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">address</th>
                        <th scope="col">Open Time</th>
                        <th scope="col">Close Time</th>
                         <th scope="col">Off Days</th>
                      </tr>
                    </thead>

                    <tbody>

                       <?php if($store){ 
                           $i =1;
                  foreach($store as $stores){ 
                            { ?>
                      <tr>                                      
                        <td >{{$stores->name}}</td>
                        <td >{{$stores->address}}</td>
                        <td >{{$stores->open_time}}</td>
                        <td >{{$stores->close_time}}</td>
                        <td >{{$stores->off_day}}</td>
                      </tr>
                     <?php  $i++;}}} ?>
                    </tbody>
                  </table>


                   
                    @php
                    $user = Auth::guard('customer')->user();
                    $user_id = $user->id;
                   @endphp

                  <input type="hidden" name="user_id" value="{{$user_id}}" required=""/>
                  <input type="hidden" name="price" value="{{$total}}" required=""/>
                  <input type="submit" value="Proceed To Checkout" class="default-btn1">
                      
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @include('layouts.footer1')