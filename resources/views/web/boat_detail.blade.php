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
    @if($banners->page_id == 4)
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
<?php 
$multi = array();
$multi =  explode(',', $gallery[0]->image);
?>
 @if(!empty($detail))
 @foreach($detail as $key => $details)
<section id="product_detail">
	<div class="container">
		<div class="product_detail_inner boat_detail">
		<div class="row">
			<div class="col-lg-6">
        <ul class="boat-gallery">
          @foreach($multi as $info)
          <li><a href="{{url('/images/boat'.$info)}}" data-fancybox="gallery" data-caption="Caption #1">
          <img src="{{url('/images/boat'.$info)}}" alt="" />
          </a></li>
         @endforeach
    
				</div>
			
			<div class="col-lg-6">
				<h4>diving Boats</h4>
				<h2>{{$details->name}}</h2>
				<h3><i class="fas fa-map-marker-alt"></i> {{$details->location}}</h3>
        <ul class="boat-feature">
          <li><i class="fas fa-ruler-horizontal"></i> {{$details->size}} M</li>
          <li><i class="far fa-user"></i> {{$details->person}}</li>
           <li><i class="fas fa-chair"> </i> {{$details->chair}}</li>
            <li><i class="fas fa-tachometer-alt"> </i>{{$details->speed}} MPH</i></li>
        </ul>
				<p>{{$details->short_description}}</p>
        <div class="product_action"> <a href="" class="btn red-btn">Book now</a> </div>
				
			</div>

		</div>
	</div>
	<div class="product_detail_inner boat_detail">
		<div class="row">
      <p>{{$details->description}}</p>
      <h2>Specifications</h2>
			<div class="col-md-6">
        <?php 
        $multi_spe = array();
        $multi_spe =  explode(',', $details->specifications);
        ?>

        <table class="table table-border">
          <tbody>
            @foreach($multi_spe as $speci)
            <tr>
              <th>{{$speci}}</th> 
            <!--  <td>Yacht</td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
       </div>
      
		</div>
	</div>
	</div>
</section>
@endforeach
@endif
<section id="review_panel">
	<div class="container">
		

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
    <h1 class="tt-title">Related Boats <a href="{{url('boat_list')}}">see all</a></h1>
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

  </div>
</section>

@include('layouts.footer1')