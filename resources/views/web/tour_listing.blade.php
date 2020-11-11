@include('layouts.header1')

<style type="text/css">
  ul.filter {
    display: inline-block;
}
.tour-filtes {
    display: inline-block;
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
    @if($banners->page_id == 7)
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
    <form method="POST" action="{{url('search_tour')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
		<div class="search-background row no-gutters">
   			<div class="form-group col-lg-9">
   				<input type="text" class="form-control input-lg" name="name" id="text" placeholder="Search Tour">
   			</div>
   			
   			<div class="form-group col-lg-3">
   				<input type="submit" value="Search" class="btn primary-btn">
   			</div>
   		</div>
    </form>
	</div>
</section>

<section id="tour" class="inner_page">
  <div class="container">
  		<ul class="filter">
  		<li class="active"><a href="#">Top Tour</a></li>
  		<li><a href="#">Popular</a></li>
  	</ul>

    <div class="tour-filtes">
        <label>Tour Type</label>
         {{ csrf_field() }}
        <select name='type' id="typeby">
            <option>All</option>
            <option value='Inside Kuwait'>Inside Kuwait</option>
            <option value='Outside Kuwait'>Outside Kuwait</option>
         </select>
    </div>
    
  		<div class="row typesearch">
  		@if(!empty($tours))
 		@foreach($tours as $key => $tour) 
  			<div class="col-lg-3">
  				<div class="course_inner">
	      		<a href="{{url('tour_detail/'.$tour->id)}}"><img src="{{url('/images/tour/'.$tour->image)}}">
	      		<!-- 	<span>top place to visit</span> --></a>
	      		<div class="course_content">
	      		<h2><a href="{{url('tour_detail/'.$tour->id)}}">{{$tour->name}}</a></h2>
	      		<!-- <h3>Brand</h3> -->
	      		<div class="product-price"><span class="old-price">AED {{$tour->price}}</span><span class="new-price">AED {{$tour->discount_price}}</span> 
	      			<span class="tour-offer">{{$tour->trip}}</span></div>
	      		</div>
	      	</div>
  			</div>

  		@endforeach
		 @endif 

  		</div>


  		<div class="row">
  		<div class="col-md-12">
  		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    
		    <li class="page-item active">
		    	<?php echo $tours->render(); ?>
		    </li>
		    
		  </ul>
		</nav>
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

<section id="why_us">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w5.jpg')}}"></div>
				<h2>book tours</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,.</p>
			</div>
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w6.jpg')}}"></div>
				<h2>Get best accomnation</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
			</div>
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w7.jpg')}}"></div>
				<h2>request for tour free</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
			</div>
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w4.jpg')}}"></div>
				<h2>call us (800)2345-6789</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
			</div>
		</div>
	</div>
</section>

@include('layouts.footer1')