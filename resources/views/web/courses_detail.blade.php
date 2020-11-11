 @include('layouts.header1')
<style type="text/css">
  .product_quntity .input-group input{
    flex: 0.4;
  }
  #more {display: none;}

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
    @if($banners->page_id == 6)
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

<section id="product_detail">
   <div class="container">
      <div class="product_detail_inner">
         <div class="row">
         	 @if(!empty($detail))
			     @foreach($detail as $key => $details)
            <div class="col-lg-6">
               <div class="gallery clearfix">
          <?php 
          $multi = array();
          $multi =  explode(',', $details->course_gallery);
          ?>
          <div class="thumbs">
           @foreach($multi as $info)
            <div class="preview"> 
               <a href="#" class="selected" data-full="{{url('/images/courses/'.$info)}}">
                <img src="{{url('/images/courses/'.$info)}}"/>
               </a> 
           </div>
          @endforeach

          
          </div>
                    <a href="{{url('/images/courses/'.$details->image)}}" class="full" >
                   <img src="{{url('/images/courses/'.$details->image)}}"> </a> 
               </div>
            </div>

            <div class="col-lg-6">
               <h4>diving Cources</h4>
               <h2>{{$details->name}}</h2>

                @if($user = Auth::guard('customer')->user())
                @if($fav == Null)
                <h3><a href="{{url('addfav_course/'.$details->id)}}"><i class="far fa-heart"></i> Add to favourites</a></h3>
                @else
                  <h3><a href="{{url('addfav_course/'.$details->id)}}"><i class="fa fa-heart" aria-hidden="true"></i>Add to favourites</a></h3>
                @endif
                @else
                <h3><a href="" data-toggle="modal" data-target="#login-users">
                <i class="far fa-heart"></i> Add to favourites</a></h3>
                @endif

               <p>{{$details->short_description}}<span id="dots"></span><span id="more">{{$details->short_description}}
                </span></p>
               <a class="read_more" onclick="myFunction()" id="myBtn">read more</a>
               <div class="product_price"><span class="old-price">KWD {{$details->price}}</span> <span class="new-price">KWD {{$details->discount_price}}</span> <span class="price-offer">30% Off</span></div>
               <div class="product_quntity">
               	<label>quantity</label>
               	<input type="number" value="1" max="{{$details->quantity}}" min="1" name="quantity"> 
               </div>
               <div class="product_action">
               <!--  <a href="" class="btn black-btn">add to cart</a>  -->
              	<a class="btn red-btn">buy now</a> 

                <label class="control-label">Certification</label>
                <select name="certification" required="" >
                          <option value="">Seleted please</option>
                          @foreach($certification as $certi)
                          <option value="{{$certi->name}}">{{$certi->name}}</option>
                         @endforeach
                    </select>
               </div>
                      

               <h5><i class="fa fa-heart"></i> 
               	<a href="">View  my favourites list</a></h5>
            </div>
         </div>
         @endforeach
		     @endif
      </div>


      <div class="product_detail_inner">
         <div class="row">
            <div class="pro_content">
               <h3>Cources detail</h3>
               <p>{{$details->description}}</p>
               <h3>How to use?</h3>
               <p>
               	{{$details->description}}
               </p>
            </div>
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
   @if($add->discount_percentage)
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
      <br>
      @else
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
      @endif
     @endforeach
     @endif 
      
	</div>
</section>
  



<section id="courses">
  <div class="container">
  <div class="container">
      <h1 class="tt-title">Required Accessories <a href="{{url('product_listing')}}">see all</a></h1>
      <div class="owl-carousel owl-theme">
         @if(!empty($reuired_accessories))
        @foreach($reuired_accessories as $key => $products)
        <div class="item">
          <div class="course_inner">
            <a href="{{url('product_detail/'.$products->id)}}"><img style="height: 274px;" src="{{url('/images/product/'.$products->image)}}"><span>{{$products->cat_name}}</span></a>
            <div class="course_content">
            <h2><a href="{{url('product_detail/'.$products->id)}}">{{$products->name}}</a></h2>
            <h3>{{$products->brand}}</h3>
            <div class="product-price"><span class="old-price">AED {{$products->price}}</span><span class="new-price">AED {{$products->price}}</span> 
              <span class="price-offer">{{$products->discount_percentage}}% off</span></div>
            </div>
          </div>
        </div>

        @endforeach
      @endif
      </div> 
  </div>
</section>




<section id="courses">
  <div class="container">
      <h1 class="tt-title">Related Cources <a href="{{url('courses_list')}}">see all</a></h1>
      <div class="owl-carousel owl-theme">
      	 @if(!empty($courses))
		    @foreach($courses as $key => $course)
        <div class="item">
          <div class="course_inner">
            <a href="{{url('courses_detail/'.$course->id)}}"><img src="{{url('/images/courses/'.$course->image)}}"><span>diving 36</span></a>
            <div class="course_content">
            <h2><a href="{{url('courses_detail/'.$course->id)}}">{{$course->name}}</a></h2>
            <h3>Brand</h3>
            <div class="product-price"><span class="old-price">AED {{$course->price}}</span><span class="new-price">AED {{$course->discount_price}}</span> 
            	<span class="price-offer">{{$course->discount_percent}}% off</span></div>
            </div>
          </div>
        </div>
      	@endforeach
		    @endif
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