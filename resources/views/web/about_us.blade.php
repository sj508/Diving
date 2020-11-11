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
    @if($banners->page_id == 12)
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


<section id="about_panel">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Dobby is Popular Swimming &amp; Diving Service Since 2009</h2>
		       @if(!empty($content))
		       @foreach($content as $about)
		       @if($about->page_id == 12)

		        <p>
		          {{$about->description}}
		        </p>
		        
		      @endif
		     @endforeach
		     @endif 
      </div>
       <div class="col-md-6">
        <img src="{{ URL::to('public/images/about-us.png')}}">
       </div>
    </div>
  </div>
</section>
<section id="about_second">
	<div class="row">
	<div class="about_tour col-md-6">
		<p>We seek adventure where others only dream</p>
		<a href="{{url('tour_list')}}" class="btn about_tour_btn">Our Tours</a>
	</div>
	<div class="about_cources col-md-6">
		<p>Make your diving experience unforgettable</p>
		<a href="{{url('courses_list')}}" class="btn about_cources_btn">Our Cources</a>
	</div>
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

<section id="courses" class="inner_page">
	 <div class="container">
	 	<h1 class="tt-title">New Diving accesories <a href="{{url('product_listing')}}">see all</a></h1>
	 	<div class="row">
	 	@if(!empty($accessories))
 		@foreach($accessories as $key => $list) 
	 		<div class="col-lg-3">
  			<div class="product_card">
  				<a href="{{url('product_detail/'.$list->id)}}"><img style=" width: 255px; height: 270px;" src="{{url('/images/product/'.$list->image)}}"><span class="pro_cat">{{$list->cat_name}}</span></a>
  				<div class="product_card_inner">
  				<h3>{{$list->name}}</h3>
  				<h4>{{$list->brand}}</h4>
  				<div class="product-price"><span class="old-price">AED {{$list->price}}</span><span class="new-price">AED {{$list->discount_price}}</span> <span class="price-offer">{{$list->discount_percentage}}% off</span></div>
  				</div>
				</div>
  			</div>
  		@endforeach
		 @endif

		 </div>
	</div>
</section>
@include('layouts.footer1')