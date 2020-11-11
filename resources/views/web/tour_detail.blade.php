@include('layouts.header1')
<style>
  .carousel-item:before{
    background: none;
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
    @if($banners->page_id == 8)
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
<section id="product_detail">
   @if(!empty($detail))
   @foreach($detail as $key => $details)
	<div class="container">
		<div class="product_detail_inner">
		<div class="row">
			<div class="col-lg-8">
					<h2>{{$details->name}}</h2>
				  <h4><i class="fas fa-map-marker-alt"></i>{{$details->type}}</h4>
        	<div class="tour_feature">
        		<div class="row">
					<div class="col-xs-6 col-lg-3 col-md-6">
						<div class="item">
							<div class="icon"><i class="far fa-clock"></i></div>
							<div class="info">
								<h4 class="name">Duration</h4>
								<p class="value">5 Hours</p>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-lg-3 col-md-6">
						<div class="item">
							<div class="icon"><i class="fas fa-umbrella-beach"></i></div>
							<div class="info">
								<h4 class="name">Tour Type</h4>
								<p class="value">{{$details->type}}</p>
							</div>
						</div>
					</div>
          @php    
          $adult = $details->adult;
          $child = $details->child;
          $person = ($adult + $child);
          @endphp
					<div class="col-xs-6 col-lg-3 col-md-6">
						<div class="item">
							<div class="icon"><i class="fas fa-luggage-cart"></i></div>
							<div class="info">
								<h4 class="name">Group Size</h4>
								<p class="value">{{$person}} persons</p>
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-lg-3 col-md-6">
						<div class="item">
							<div class="icon"><i class="fas fa-map-marked-alt"></i></div>
							<div class="info">
								<h4 class="name">Location</h4>
								<p class="value">{{$details->location}}</p>
							</div>
						</div>
					</div>
					</div>
        	</div>
     
        <?php 
        $multi = array();
        $multi =  explode(',', $details->gallery_img);
        ?>
        <div class="tour_head1">
          <div id="slider" class="flexslider">
            <ul class="slides">
               @foreach($multi as $info)
              <li>
                <img src="{{url('/images/tour/gallery/'.$info)}}" />
              </li>     
               @endforeach 
            </ul>
          </div>
          <div id="carousel" class="flexslider">
            <ul class="slides">
              @foreach($multi as $info)
             <li>
                <img src="{{url('/images/tour/gallery/'.$info)}}" />
              </li>
               @endforeach 
            </ul>
        </div>
      </div>
      
 

 <div class="tour_head1">
 	<h3>Overview</h3>
         <p>{{$details->description}}</p>
          
        </div>
      <div class="tour_head1">
   <h3>TOUR & AMENITIES </h3>
   <div class="row">

      <div class="col-lg-6 col-md-6 list1">
        @foreach(explode(',', $details->including) as $including) 
         <div class="item">
            <i class="fa fa-check"></i>
            {{$including}}
         </div>
         @endforeach 
    
      </div>

      <div class="col-lg-6 col-md-6 list2">
        @foreach(explode(',', $details->exincluding) as $excluding)
         <div class="item">
            <i class="fas fa-times"></i>
            {{$excluding}}
         </div>
        @endforeach 
      </div>

   </div>
</div>
         


  <div class="tour_head1">
    <h3>Location</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d649788.5753409272!2d-0.5724199684037448!3d52.92186340524542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d94c3b82ab%3A0x62077a554c8e9a8e!2sPetty%20France%2C%20Westminster%2C%20London%2C%20UK!5e0!3m2!1sen!2sbd!4v1572346566908!5m2!1sen!2sbd"></iframe>

    <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBe55a_qbs6_O5osTFmpjwdABd3sVT8Yy8&q=<? echo "{{$details->location}}"?>&attribution_source=Google+Maps+Embed+API"> -->
  </iframe>
  </div>
          
    
	</div>
			
			<div class="col-lg-4">
          <div class="right-sidebar">
        <div class="right-sidebar__item">
            <h3><span class="right-sidebar__item__from">Price</span>
              <span class="right-sidebar__item__sale">${{$details->discount_price}}</span>
              <!-- <span class="old-price">$799</span> --></h3>
            <div class="form-outer-book">
	            <div class="tour_tab">
	            	<span class="active">Book</span>
                <span data-toggle="modal" data-target="#exampleModalCenter">Request</span>
	            </div>
	            <div class="form-book">         	
	            	<div class="form-group">
	            		<label>Adult</label>
	            		<span>Age 18+ per person</span>
                  <input type="number" value="0" min="0" max="{{$details->adult}}" step="1"/>
	            	</div>
	            	<div class="form-group">
	            		<label>child</label>
	            		<span>Age 18+  per person</span><input type="number" value="0" min="0" max="{{$details->child}}" step="1"/>
	            	</div>
	            	@if($user = Auth::guard('customer')->user())
	            	<div class="form-group">
                  <input type="submit" value="BOOK NOW" class="btn primary-btn">
                </div>
                @else
                <a data-toggle="modal" data-target="#login-users" class="btn primary-btn">BOOK NOW</a>
                @endif
	            </div>
        	</div>
            
            
        </div>
        
    </div>
			</div>
		</div>
	</div>
	
	</div>
@endforeach
@endif
</section>


<section id="tour">
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


<section id="tour">
   <div class="container">
      <h1 class="tt-title">related tour <a href="{{url('tour_list')}}">see all</a></h1>
      <div class="owl-carousel owl-theme">
          @if(!empty($tours))
         @foreach($tours as $key => $tour)
         <div class="item">
            <div class="course_inner">
               <a href="{{url('tour_detail/'.$tour->id)}}"><img src="{{url('/images/tour/'.$tour->image)}}"><span>top place to visit</span></a>
               <div class="course_content">
                  <h2><a href="{{url('tour_detail/'.$tour->id)}}">{{$tour->name}}</a></h2>
                  <h3>Brand</h3>
                  <div class="product-price"><span class="old-price">AED {{$tour->price}}</span><span class="new-price">AED {{$tour->discount_price}}</span> <span class="tour-offer">{{$tour->trip}}</span></div>
               </div>
            </div>
         </div>
      @endforeach
     @endif 
      </div>
   </div>
</section>

<div class="modal fade request_form" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tour Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{url('tour_inquery')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
             <div class="row">
              <div class="col-md-6">
                <label>Full Name</label>
                <input name="name" type="text" class="form-control" placeholder="Full Name" required="">
              </div>

              <div class="col-md-6">
                <label>Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email Id" required=""> 
               </div> 

              <div class="col-md-6">
                <label>To Date</label>
                <input name="to_date" type="date" data-select="datepicker" autocomplete="off" class="form-control" placeholder="Travel Date " required="">
              </div>

                <div class="col-md-6">
                <label>From Date</label>
                <input name="from_date" type="date" data-select="datepicker" autocomplete="off" class="form-control" placeholder="Travel Date " required="">
               </div>

                <div class="col-md-6">
                <label>To Place</label>
                <input name="to_tour" type="text" class="form-control" placeholder="place" required=""> 
               </div>

                <div class="col-md-6">
                <label>Form Place</label>
                <input name="from_tour" type="text" class="form-control" placeholder="place" required=""> 
               </div>

                <div class="col-md-6">
                  <label>Adult</label>
                  <input type="number" name="adult" value="1" min="0" max="10" step="1" />
                </div>
           

              <div class="col-md-6">
                  <label>Child</label>
                  <input type="number" name="child" value="0" min="0" max="10" step="1"/>
                </div>
              
               <div class="col-md-6">
                  <label>Senior</label>
                  <input type="number" name="senior" value="0" min="0" max="10" step="1"/>
                </div>

               <div class="col-md-6">
                <label>Inquery</label>
                <textarea name="comment" cols="30" rows="10" class="form-control" placeholder="Your Inquery"></textarea>
              </div>

              </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn primary-btn">BOOK NOW</button>
      </div>
      </form>
    </div>
  </div>
</div>


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