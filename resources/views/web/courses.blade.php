@include('layouts.header1')
<style>
	.pagination li span{
    		font-size: 15px;
    	padding: 7px 14px;
		}
		.pagination .active{
		    background: #000;
		    color: #fff;
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
    @if($banners->page_id == 5)
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
        <a href="{{url('contact_us')}}" class="btn primary-btn">Join Now</a>
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

<section id="search_panel">
	<div class="container">
		<form method="POST" action="{{url('search_courses')}}" enctype="multipart/form-data">
               {{ csrf_field() }}
		<div class="search-background row no-gutters">
   			<div class="form-group col-lg-9">
   				<input type="text" class="form-control input-lg" name="name" id="text" placeholder="Search Cources">
   			</div>
   			
   			<div class="form-group col-lg-3">
   				<input type="submit" value="Search" class="btn primary-btn">
   			</div>
   		
   		</div>
   		</form>
	</div>
</section>

<section id="courses" class="inner_page">
  <div class="container">
  	<ul class="filter">
  		<li class="active"><a href="#">Top Cources</a></li>
  		<li><a href="#">Popular</a></li>
  	</ul>
  	<div class="row">
  		 @if(!empty($courses))
 		@foreach($courses as $key => $course) 
  		<div class="col-lg-3">
  			<div class="course_inner">
	      		<a href="{{url('courses_detail/'.$course->id)}}"><img src="{{url('/images/courses/'.$course->image)}}">
	      			<span>diving 36</span>
	      		</a>
	      		<div class="course_content">
	      		<h2><a href="{{url('courses_detail/'.$course->id)}}">{{$course->name}}</a></h2>
	      		<h3>Tranning place : {{$course->tranning_place}}</h3>
	      		<div class="product-price"><span class="old-price">KWD {{$course->price}}</span>
	      		<span class="new-price">AED {{$course->discount_price}}</span> 
	      		<span class="cart"><img src="{{ URL::to('public/images/bag.png')}}"></span>
	      		</div>
	      		</div>
	      	</div>
  		</div>

  		@endforeach
		 @endif 

  	</div>
  	<div class="row">
  		<div class="col-md-12">
  		<nav aria-label="Page navigation example">
		 <!--  <ul class="pagination"> -->
		    
		   <!--  <li class="page-item active"> -->
		    	<?php echo $courses->render(); ?>
		    <!-- </li> -->
		    
		<!--   </ul> -->
		</nav>
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

<section id="team" class="inner_page">
  <div class="container">
  		<h1 class="tt-title">behind the scenes <a href="team.html">see all</a></h1>
  		<h4 class="text-center">a team of bright professional</h4>
  		<div id="team_carousal" class="owl-carousel owl-theme" >
	      <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t1.jpg')}}"></a>
	      		<h2>Basel Bo Hamad</h2>
	      		<h3>Diving Instructor</h3>
	      	</div>
	      </div>
	       <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t2.jpg')}}"></a>
	      		<h2>Anas F. Al-Kanderi</h2>
	      		<h3>Dive Con Instructor</h3>
	      	</div>
	      </div>
	       <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t3.jpg')}}"></a>
	      		<h2>Rashed Marshoud</h2>
	      		<h3>Diving Instructor</h3>
	      	</div>
	      </div>
	       <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t4.jpg')}}"></a>
	      		<h2>Saad Hmoud</h2>
	      		<h3>Diving Instructor</h3>
	      	</div>
	      </div>
	       <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t5.jpg')}}"></a>
	      		<h2>Ali Hussain</h2>
	      		<h3>Dive CON</h3>
	      	</div>
	      </div>
	      <div class="item">
	      	<div class="team_inner">
	      		<a href="#"><img src="{{ URL::to('public/images/t6.jpg')}}"></a>
	      		<h2>Yousef Khajah</h2>
	      		<h3>Diving Instructor</h3>
	      	</div>
	      </div>
    	</div> 
    	

  </div>
</section>

@include('layouts.footer1')