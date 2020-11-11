 @include('layouts.header1')
<style>
#more {display: none;}
.product_quntity .input-group input{
    flex: 0.4;
  }
</style>
 <section id="banner_outer" class="inner_page_banner">
 	<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  <div class="carousel-inner">

     @if(!empty($banner))
    @foreach($banner as $key => $banners) 
    @if($banners->page_id == 10)
    <?php 
    $multi = array();
    $multi =  explode(',', $banners->image);
    ?>
    @foreach($multi as $key => $info)
   
    <div class="carousel-item  @if($key == 0) active @endif">
      <img src="{{url('/images/banner'.$info)}}" alt="" >
      <div class="carousel-caption">
        <h3>{{$banners->heading}}</h3>
        <p>{{$banners->short_description}}  </p>
      </div>   
    </div>

     @endforeach
     @endif
     @endforeach
     @endif

   
    
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"><i class="fa fa-angle-left"></i></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"><i class="fa fa-angle-right"></i></span>
  </a>
</div>
 </section>
  @if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<?php 
$multi = array();
$multi =  explode(',', $getGalleryProductImage->image);
?>
<section id="product_detail">
	<div class="container">
		<div class="product_detail_inner">
		<div class="row">
			<div class="col-lg-6">
				<div class="gallery clearfix">	
					<div class="thumbs">
					@foreach($multi as $info)
					<div class="preview">
					<a href="#" class="selected" data-full="{{ URL::to('images/gallery')}}/{{$info}}"> 
					<img src="{{ URL::to('images/gallery')}}/{{$info}}"/> </a>
					 </div>
					  @endforeach 
					</div>
					
				<a href="{{ URL::to('images/product/')}}/{{$getSingleProduct->image}}" class="full" > 
				<img src="{{ URL::to('images/product/')}}/{{$getSingleProduct->image}}"> </a> 	
				</div>
			</div>
			

			
			<div class="col-lg-6">
				<h4>diving accessories</h4>
				<h2>{{$getSingleProduct->name}}</h2>

				@if($user = Auth::guard('customer')->user())
				@if($fav == Null)
				<h3><a href="{{url('addfav/'.$getSingleProduct->id)}}"><i class="far fa-heart"></i> Add to favourites</a></h3>
				@else
					<h3><a href="{{url('addfav/'.$getSingleProduct->id)}}"><i class="fa fa-heart" aria-hidden="true"></i>Add to favourites</a></h3>
				@endif
				@else
				<h3><a href="#" data-toggle="modal" data-target="#login-users">
				<i class="far fa-heart"></i> Add to favourites</a></h3>
				@endif


				<p>{{$getSingleProduct->short_description}} <span id="dots"></span><span id="more">{{$getSingleProduct->short_description}}
				</span></p>
				<a class="read_more" onclick="myFunction()" id="myBtn">read more</a>
				<div class="product_price">
				    <span class="old-price">KWD {{number_format($getSingleProduct->price,2)}}</span> 
				    <span class="new-price">KWD {{number_format($getSingleProduct->discount_price,2)}}</span> 
				    <span class="price-offer">{{$getSingleProduct->discount_percentage}}% Off</span>
				</div>
			
				<form method="POST" action="{{url('add_cart')}}" enctype="multipart/form-data">
			           {{ csrf_field() }}
						<div class="product_quntity">
						    <label>quantity</label>

						    <input type="number" name="quantity" value="1" max="{{$getSingleProduct->quantity}}" min="1"> 
						    <!-- <button>+</button> 
						    <button>-</button> -->
						</div>

			           <input type="hidden" name="name" value="{{$getSingleProduct->name}}" required=""/>
			            <input type="hidden" name="price" value="{{$getSingleProduct->discount_price}}" required=""/>
			            <input type="hidden" name="type" value="{{$getSingleProduct->type}}" required=""/>
			  
			            <input type="hidden" name="img" value="{{$getSingleProduct->image}}" required=""/>
							
							 <div class="product_action">
								@if($user = Auth::guard('customer')->user())
									 <input type="submit" class="btn black-btn" value="add to cart">.
								@elseif($getSingleProduct->quantity == 0)
									<a class="btn black-btn">Out of Stock</a>
                @else
                  <a data-toggle="modal" data-target="#login-users" class="btn black-btn">add to cart</a>
								@endif
							        <?php
							        if($getSingleProduct->type == 0){ ?>
							            <a class="btn white-btn">Rentable</a>
							        <?php } ?>
							 </div>

					</form>


				<!-- <h5><i class="fa fa-heart"></i> <a href="#">View  my favourites list</a></h5> -->
			</div>
		</div>
	</div>
	<div class="product_detail_inner">
		<div class="row">
			<div class="pro_content"><?php echo htmlspecialchars_decode($getSingleProduct->description); ?></div>
		</div>
	</div>
	</div>
</section>
<section id="review_panel">
	<div class="container">
		<div class="review_panel_inner">
		<div class="row">
			<div class="col-md-6">
				<h2>Review (1480)</h2>
				<div class="rating-head"><i class="far fa-star"></i> 4/5 Average rating</div>
			</div>
			<div class="col-md-6 text-right"><a href="#" class="btn primary-btn">Write Review</a></div>
		</div>
		<div class="rating_panel">
			<div class="row">
				<div class="col-md-6">
					<div class="user_icon"><i class="far fa-user-circle"></i></div>
					<div class="user_review">
						<h3>Name username</h3>
						<div class="rating-star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fa fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
						<h6>5 septemper 2018</h6>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="user_icon"><i class="far fa-user-circle"></i></div>
					<div class="user_review">
						<h3>Name username</h3>
						<div class="rating-star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fa fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
						<h6>5 septemper 2018</h6>
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if(!empty($advertisement))
   @foreach($advertisement as $add)
   @if($add->price)
      <div class="add-panel">
        <div class="row">
        <div class="col-md-9">
          <div class="add-title">
            <img src="{{ URL::to('public/images/logo.png')}}" class="add-logo"> {{$add->title}} <span>@ {{$add->price}} KWD</span> {{$add->short_description}}</div>
          </div>
        <div class="col-md-3 text-center">
          <a href="" class="btn primary-btn">play your tour</a>
        </div>
      </div>
      </div>
      <br>
      @else
        <div class="add-panel">
        <div class="row">
        <div class="col-md-9">
          <div class="add-title">
            <img src="{{ URL::to('public/images/logo.png')}}" class="add-logo"> {{$add->title}} <span>{{$add->discount_percentage}}% Off</span> {{$add->short_description}}</div>
          </div>
        <div class="col-md-3 text-center">
          <a href="" class="btn primary-btn">book now</a>
        </div>
      </div>
      </div>
      @endif
     @endforeach
     @endif

      
	</div>
</section>
  



<section id="courses" class="related-pro">
    <div class="container">
  		<h1 class="tt-title">Related Products </h1>
  		<div class="owl-carousel owl-theme">
  		    <?php
  		    if(!empty($getRelatedProduct)){ ?>
      		    @foreach ($getRelatedProduct as $value)
    	            <div class="item">
    	      	        <div class="product_card">
      				        <a href="{{url('product_detail/'.$value->id)}}"><img style=" width: 255px; height: 270px;" src="{{ URL::to('images/product/')}}/{{$value->image}}">
      				            <span class="pro_cat">{{$value->cat_name}}</span>
      				        </a>
      				        <div class="product_card_inner">
                  				<h3>{{$value->name}}</h3>
                  				<h4>{{$value->brand}}</h4>
                  				<div class="product-price">
                  				    <span class="old-price">AED {{number_format($value->price,2)}}</span>
                  				    <span class="new-price">AED {{number_format($value->discount_price,2)}}</span> 
                  				    <span class="price-offer">{{$value->discount_percentage}}% off</span>
                  				</div>
              				</div>
    				    </div>
    	            </div>
    	       @endforeach
    	   <?php } ?>
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

    <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

@include('layouts.footer1')