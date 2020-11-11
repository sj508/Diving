@include('layouts.header1')


 @if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

 <section id="banner_outer">
 	<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  <div class="carousel-inner">
    
    @if(!empty($banner))
    @foreach($banner as $key => $banners) 
    @if($banners->page_id == 1)
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
        <a href="{{url('contact_us')}}" class="btn primary-btn">contact us</a>
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



<section id="about_panel">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="about_img"><img src="{{ URL::to('public/images/about.jpg')}}"></div>
      </div>
      <div class="col-lg-6 col-md-12">
        <h1 class="tt-title">About Us</h1>
        <h2 class="sub_title">you'll never dive alone</h2>

        @if(!empty($content))
       @foreach($content as $about)
       @if($about->page_id == 1)

        <p>
          {{$about->description}}
        </p>
        
      @endif
     @endforeach
     @endif 

        <a href="{{url('about_us')}}" class="btn btn-secondry">learn more</a>
         
      </div>
    </div>
    
  </div>
</section>


<section id="product_panel">
  <div class="container">
  	<h1 class="tt-title">New Diving accesories <a href="{{url('product_listing')}}">see all</a></h1>

  	<div class="row">

  		<div class="col-md-6">
  			<div class="product_card primary-bg">
  				<a href="{{url('product_detail/'.$accesories[0]->id)}}"><img src="{{url('/images/product/'.$accesories[0]->image)}}"></a>
  				<h3>{{$accesories[0]->name}}</h3>
  				<h4>{{$accesories[0]->brand}}</h4>
  				<div class="product-price"><span class="old-price">AED {{$accesories[0]->price}}</span><span class="new-price">AED {{$accesories[0]->discount_price}}</span> <span class="price-offer">{{$accesories[0]->discount_percentage}}% off</span></div>
  				<a href="{{url('product_detail/'.$accesories[0]->id)}}" class="btn default-btn">Show now</a>
  			</div>
  		</div>

  		<div class="col-md-6">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="product_card">
		  				<a href="{{url('product_detail/'.$accesories[1]->id)}}"><img src="{{url('/images/product/'.$accesories[1]->image)}}"><span class="pro_cat">{{$accesories[1]->cat_name}}</span></a>
		  				<h3>{{$accesories[1]->name}}</h3>
		  				<h4>{{$accesories[1]->brand}}</h4>
		  				<div class="product-price"><span class="old-price">AED {{$accesories[1]->price}}</span><span class="new-price">AED {{$accesories[1]->discount_price}}</span> <span class="price-offer">{{$accesories[1]->discount_percentage}}% off</span></div>
	  				</div>
  				</div>

  				<div class="col-md-6">
  					<div class="product_card">
		  				<a href="{{url('product_detail/'.$accesories[2]->id)}}"><img src="{{url('/images/product/'.$accesories[2]->image)}}"><span class="pro_cat">{{$accesories[2]->cat_name}}</span></a>
		  				<h3>{{$accesories[2]->name}}</h3>
		  				<h4>{{$accesories[2]->brand}}</h4>
		  				<div class="product-price"><span class="old-price">AED {{$accesories[2]->price}}</span><span class="new-price">AED {{$accesories[2]->discount_price}}</span> <span class="price-offer">{{$accesories[2]->discount_percentage}}% off</span></div>
	  				</div>
  				</div>
  				<div class="col-md-12">
  					<div class="product_card">
		  				<a href="{{url('product_detail/'.$accesories[3]->id)}}"><img src="{{url('/images/product/'.$accesories[3]->image)}}"></a>
		  				<h3>{{$accesories[3]->name}}</h3>
		  				<h4>{{$accesories[3]->brand}}</h4>
		  				<div class="product-price"><span class="old-price">AED {{$accesories[3]->price}}</span><span class="new-price">AED {{$accesories[3]->discount_price}}</span> <span class="price-offer">{{$accesories[3]->discount_percentage}}% off</span></div>
		  				<a href="{{url('product_detail/'.$accesories[3]->id)}}" class="btn default-btn">Show now</a>
	  				</div>
  				</div>
  			</div>

  		</div>

  	</div>

  	</div>
 </section>
 
<section id="courses">
  <div class="container">
  		<h1 class="tt-title">book Diving courcess <a href="{{url('courses_list')}}">see all</a></h1>
  		<div class="owl-carousel owl-theme">
  @if(!empty($courses))
 @foreach($courses as $key => $course) 
   <div class="item">
      <div class="course_inner">
         <a href="{{url('courses_detail/'.$course->id)}}"><img src="{{url('/images/courses/'.$course->image)}}"><span>diving 36</span></a>
         <div class="course_content">
            <h2><a href="{{url('courses_detail/'.$course->id)}}">{{$course->name}}</a></h2>
            <h3>Brand</h3>
            <div class="product-price">
               <span class="old-price">AED{{$course->price}}</span>
               <span class="new-price">AED{{$course->discount_price}}</span> 
               <span class="price-offer">{{$course->discount_percent}}%OFF</span>
            </div>
         </div>
      </div>
   </div>
   @endforeach
 @endif 

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
      @endif
     @endforeach
     @endif 

  </div>
</section>



<section id="client_panel">
  <div class="container">
  	<h1 class="tt-title text-center">our client</h1>
  	<div class="client-img text-center">
        @if(!empty($client))
        @foreach($client as $key => $clients)
  		    <a href=""><img src="{{url('/images/ourclient/'.$clients->image)}}"></a>
  		 @endforeach
       @endif 
  	</div>
   

  </div>
</section>

<section id="tour">
  <div class="container">
  		<h1 class="tt-title">top tour <a href="{{url('tour_list')}}">see all</a></h1>
  		<div class="owl-carousel owl-theme">
  @if(!empty($tour))
 @foreach($tour as $key => $tours)
	      <div class="item">
	      	<div class="course_inner">
	      		<a href="{{url('tour_detail/'.$tours->id)}}"><img src="{{url('/images/tour/'.$tours->image)}}">
              <!-- <span>top place to visit</span> --></a>
	      		<div class="course_content">
	      		<h2><a href="{{url('tour_detail/'.$tours->id)}}">{{$tours->name}}</a></h2>
	      	<!-- 	<h3>Brand</h3> -->
	      		<div class="product-price">
	      		<span class="old-price">AED{{$tours->price}}</span>
	      		<span class="new-price">AED{{$tours->discount_price}}</span> 
	      		<span class="tour-offer">{{$tours->trip}}</span></div>
	      		</div>
	      	</div>
	      </div>
 @endforeach
 @endif 
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
      @endif
     @endforeach
     @endif 

  </div>
</section>
<section id="team">
  <div class="container">
  		<h1 class="tt-title">behind the scenes <a href="{{url('team')}}">see all</a></h1>
  		<h4 class="text-center">a team of bright professional</h4>
  		<div id="team_carousal" class="owl-carousel owl-theme" >
        @if(!empty($ourteam))
        @foreach($ourteam as $team)
	      <div class="item">
	      	<div class="team_inner">
	      		<a href=""><img src="{{url('/images/ourteam/'.$team->image)}}"></a>
	      		<h2>{{$team->name}}</h2>
	      		<h3>{{$team->designation}}</h3>
	      	</div>
	      </div>
  	   @endforeach
       @endif 
	     
    	</div> 
    	

  </div>
</section>

<!--MODAL -->
   <div class="modal fade" id="login-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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