@include('layouts.header1')
 <div class="gallery_outer">
   <div class="container">
      <h2>Gallery</h2>
      <section>
      	
      	@if(!empty($gallery))
   		 @foreach($gallery as $key => $gallerys)
	   		 <?php 
	        $multi = array();
	        $multi =  explode(',', $gallerys->image);
	        ?>
	       @foreach($multi as $info)
         <a href="{{url('/images/gallery/'.$info)}}" data-fancybox="gallery">
         	<img src="{{url('/images/gallery/'.$info)}}" />
         </a>
         @endforeach 
         @endforeach
    	 @endif

      </section>
   </div>
</div>
 @include('layouts.footer1')