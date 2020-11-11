@include('layouts.header1')

 @if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<style>
  #search_panel select{
    color: #fff !important;
  }
  .drp_dwn option{
    background: #000;
    padding: 10px 10px;
  }
  .inner_page .sidebar {
    box-shadow: 0px 2px 8px 0px #00000052;
    padding: 15px;
  }
  .product_card img {
    width: 223px;
    height: 230px;
}
.filtr{
  padding: 15px;
}
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
    @if($banners->page_id == 9)
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
        <a href="{{url('contact_us')}}" class="btn primary-btn">Discover Now</a>
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
    <form method="POST" action="{{url('search_product')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="search-background row no-gutters">
             <div class="form-group col-lg-3">
             <select class="form-control drp_dwn" id="cat_id" name="cat_id">
                <option value="">Please Select category</option>
                     <?php foreach ($category as $key=>$categorys): ?>
                     <option value="<?php echo $categorys->id; ?>" <?php
                     if (isset($cat_id) && Input::old('cat_id') == $categorys->name)
                    {
                        echo 'selected="selected"';
                     }
                    ?>>
                     <?php  echo $categorys->name; ?></option>
                     <?php endforeach; ?>
            </select>
         </div>
         <div class="form-group col-lg-6">
          <input type="text" class="form-control input-lg" name="name" id="text" placeholder="Search Product">
        </div>
         <div class="form-group col-lg-3">
            <input type="submit" value="Search" class="btn primary-btn">
         </div>
      </div>
    </form>
   </div>
</section>

<section id="courses" class="inner_page">
  <div class="container"><div class="row">
  	<div class="col-lg-4">
  		<div class="sidebar">
<!--   			<div class="sidebar_inner">
  				<h3>Category</h3>
  			<ul>
   <li><img src="{{ URL::to('public/images/sidebar-icon.png')}}"> <span>All</span></li>
   @if(!empty($category))
 @foreach($category as $key => $categorys)
   <li>
      <div class="form-group">
        <input type="checkbox" value="{{$categorys->id}}" id="acessories">
        <label for="acessories">{{$categorys->name}}</label>
      </div>
   </li>
  @endforeach
 @endif
 



</ul>
  			</div> -->
  			
  			<div class="special_product">
  				<h3>Special Product</h3>
  				<div class="special_product_inner"><div class="row">
  					<div class="col-md-4"><a href="#"><img src="{{ URL::to('public/images/pro8.png')}}"></a></div>
  					<div class="col-md-8">
  						<div class="sproduct_inner">
			  				<h3>ocean vortext V16 Fins </h3>
			  				<h4>Fan</h4>
			  				<p>We Love what we do and our activity</p>
			  				<div class="product-price"><span class="price-offer">30% off</span><span class="old-price">AED 20.98</span><span class="new-price">AED 30.98</span> </div>
			  				</div>
  					</div></div>
				</div>
  			</div>
  			<div class="text-center"><a href="#" class="btn primary-btn">All Special Product</a></div>
  		</div>
  	</div>
  	<div class="col-lg-8 filtr">
  	<ul class="filter">
  		<li class="active"><a href="#">new arrival</a></li>
  		<li><a href="#">Popular</a></li>
  		<li><a href="#">Top Products</a></li>
  	</ul>


  <div class="row">
 @if(!empty($product))
 @foreach($product as $key => $products)
   <div class="col-lg-4">
      <div class="product_card">
         <a href="{{url('product_detail/'.$products->id)}}"><img src="{{url('/images/product/'.$products->image)}}"><span class="pro_cat">{{$products->cat_name}}</span></a>
         <div class="product_card_inner">
            <h3>{{$products->name}}</h3>
            <h4>{{$products->brand}}</h4>
            <div class="product-price">
              <span class="old-price">AED {{$products->price}}</span>
              <span class="new-price">AED {{$products->discount_price}}</span>
               <span class="price-offer">{{$products->discount_percentage}}% off</span>
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
     <!--  <ul class="pagination">
        
        <li class="page-item active"> -->
          
          <?php echo $product->render(); ?>
       <!--  </li>
        
      </ul> -->
    </nav>
    </div>
  </div>

  	</div>
  		 </div>
    	
    	</div>

  </div>
</section>

<section id="why_us">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w1.jpg')}}"></div>
				<h2>buy diving accesories</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,.</p>
			</div>
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w2.jpg')}}"></div>
				<h2>Get on rent</h2>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
			</div>
			<div class="col-md-3">
				<div class="why_us_icon"><img src="{{ URL::to('public/images/w3.jpg')}}"></div>
				<h2>free shipping</h2>
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