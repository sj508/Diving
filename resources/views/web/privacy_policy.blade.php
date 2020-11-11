@include('layouts.header1')
<section class="default_container text-center">
   <div class="container">
    <div class="row text-center">
      <div class="thankyou-content" style="margin: 0 auto;">
        <h2 class="demo-title">Privacy Policy</h2>
       </div>
     </div>

			@if(!empty($content))
		       @foreach($content as $privacy)
		       @if($privacy->page_id == 14)

		        <p>
		          {{$privacy->description}}
		        </p>
		        
		      @endif
		     @endforeach
		     @endif 
  
     </div>
 </section>

 
 @include('layouts.footer1')