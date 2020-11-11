 @include('layouts.header1')
<section id="banner_outer" class="inner_page_banner">
 	<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  <div class="carousel-inner">
    
   @if(!empty($banner))
    @foreach($banner as $key => $banners) 
    @if($banners->page_id == 3)
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



<section id="tour" class="inner_page">
  <div class="container">
  		<ul class="filter">
  		<li class="active"><a href="">Top Boat</a></li>
  		<li><a href="">Popular</a></li>
  	</ul>
  		<div class="row">
  		@if(!empty($boat))
 		@foreach($boat as $key => $boats) 
  			<div class="col-lg-3">
  				<div class="course_inner">
	      		<a href="{{url('boat_detail/'.$boats->id)}}"><img src="{{url('/images/boat/'.$boats->image)}}"></a>
	      		<div class="course_content">
	      		<h2><a href="{{url('boat_detail/'.$boats->id)}}">{{$boats->name}}</a></h2>
	      		<h3><i class="fas fa-map-marker-alt"></i> {{$boats->location}}</h3>
	      		<div class="product-price"><span class="old-price">AED {{$boats->price}}</span><span class="new-price">AED {{$boats->discount_price}}</span> </div>
	      		</div>
	      	</div>
  			</div>
  		 @endforeach
		 @endif 
  			
  		
  		</div>


  		<div class="col-md-12">
  		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <li class="page-item active">
		    	<?php echo $boat->render(); ?>
		    </li>
		  </ul>
		</nav>
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
@include('layouts.footer1')