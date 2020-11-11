<footer>
  <div class="container">
    <div class="row">
	   <div class="col-lg-2 col-md-6 col-sm-6">
      <a href="{{url('/')}}">
      <img src="{{ URL::to('public/images/logo.png')}}"></a>
    	</div>

      <div class="col-lg-2 col-md-6 col-sm-6">
   <h3 class="wg-title">main pages</h3>
   <div class="menu-footer-6">
      <ul>
         <li><a href="{{url('product_listing')}}">shop</a></li>
         <li><a href="{{url('tour_list')}}">tour</a></li>
         <li><a href="{{url('product_listing')}}">diving accessorise</a></li>
         <li><a href="{{url('courses_list')}}">diving classes</a></li>
         <li><a href="#">become member</a></li>
      </ul>
   </div>
</div>
<div class="col-lg-2 col-md-6 col-sm-6">
   <h3 class="wg-title">policy</h3>
   <div class="menu-footer-6">
      <ul>
         <li><a href="{{url('terms')}}">terms of usage</a></li>
         <li><a href="{{url('privacy_policy')}}">privacy policy</a></li>
         <li><a href="#">return policy</a></li>
      </ul>
   </div>
</div>
<div class="col-lg-2 col-md-6 col-sm-6">
   <h3 class="wg-title">category</h3>
   <div class="menu-footer-6">
      <ul>
         <li><a href="{{url('product_listing')}}">diving accessorise</a></li>
         <li><a href="{{url('search_tours/'.'1')}}">inside kuwait tour</a></li>
         <li><a href="{{url('search_tours/'.'2')}}">our side kuwait tour</a></li>
         <li><a href="{{url('search_rent')}}">accessorise for rent</a></li>
         <li><a href="{{url('membership_plan')}}">club membership</a></li>
      </ul>
   </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
   <h3 class="wg-title">SUBSCRIBE</h3>
   <p>subscribe to our newsletter. so that you can be first to know about new offers and promotion</p>
    <form method="POST" action="{{url('subscribe')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
      <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required="">
      <input class="newsletter-submit" type="submit" value="Subscribe">
   </form>
  @if (Session::has('subscri'))
     <div style="color: #16ec08;">{{ Session::get('subscri') }}</div>
  @endif
</div>
      

    </div>
  </div>
</footer>
<div class="footer-bottom">
  <div class="container">
    <div class="row">
    	<div class="col-lg-6"><p>© 2018  All Rights Reserved.</p></div>
    	<div class="col-lg-6 text-right">
        <a href="">
          <img src="{{ URL::to('public/images/card1.png')}}">
        </a>
          <a href="">
        <img src="{{ URL::to('public/images/card2.png')}}"></a>
        <a href="">
          <img src="{{ URL::to('public/images/card3.png')}}">
        </a>
      </div>
  </div>
  </div>
</div>

<script>
  $('#Pick-up').click(function(){
  $("p").text("Pick up their ordered item to their nearest store location. (This case is only applicable for rented products)");
   $("#show_store").show();
   $("h5").show();
});
    $('#Delivery').click(function(){
  $("p").text("");
  $("#show_store").hide();
  $("h5").hide();
});
</script>


 <!-- <script type="text/javascript" src="{{ URL::to('public/js/jquery-ui.min.js')}}"></script> --> 

 <script src="{{ URL::to('public/js/owl.carousel.js')}}"></script>
 <script type="text/javascript">
 	if ($(window).width() > 992) {
  $(window).scroll(function(){  
     if ($(this).scrollTop() > 40) {
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
      }else{
        $('#navbar_top').removeClass("fixed-top");
         // remove padding top from body
        $('body').css('padding-top', '0');
      }   
  });
} // end if


$("[data-trigger]").on("click", function(){
    var trigger_id =  $(this).attr('data-trigger');
    $(trigger_id).toggleClass("show");
    $('body').toggleClass("offcanvas-active");
});

// close button 
$(".btn-close").click(function(e){
    $(".navbar-collapse").removeClass("show");
    $("body").removeClass("offcanvas-active");
}); 
 </script>
  <script>
            $(document).ready(function() {
            	$('#team_carousal').owlCarousel({
                loop: true,
                margin: 5,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items:5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              });
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items:4,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              });

              

            })
          </script>
<script>

  var minVal = 1, maxVal = 10; // Set Max and Min values
  // Increase product quantity on cart page
  $(".increaseQty").on('click', function(){
      var $parentElm = $(this).parents(".qtySelector");
      $(this).addClass("clicked");
      setTimeout(function(){
        $(".clicked").removeClass("clicked");
      },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value < maxVal) {
        value++;
      }
      $parentElm.find(".qtyValue").val(value);
  });
  // Decrease product quantity on cart page
  $(".decreaseQty").on('click', function(){
      var $parentElm = $(this).parents(".qtySelector");
      $(this).addClass("clicked");
      setTimeout(function(){
        $(".clicked").removeClass("clicked");
      },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value > 1) {
        value--;
      }
      $parentElm.find(".qtyValue").val(value);
    });

</script>

<script>
jQuery(document).ready(function(){
  
  //use values after the loop
  //
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  var base_url = '<?php echo url('/'); ?>';
  jQuery('.updatecart').click(function(e){
    e.preventDefault();
    var total = $('.subtotal-amount').text();
    var qunt_value = $('.qtyValue').val();
    var card_id = $('#card_id').val();
    var total_price =  total.replace(/\$/g,'')

    var token = $('input[name="_token"]').val(); 
    $.ajax({
       type:'POST',
       url:base_url+'/updatecart',
       data:{cardid:card_id,q_value:qunt_value,price:total_price,_token:token},
       success:function(data){   
          if(data == 1){
            window.location.reload();
          }
       }
    });
  });
});
</script>

  <script src="{{ URL::to('public/js/bootstrap-input-spinner.js')}}"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>

  <script type="text/javascript">
    
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<script src="{{ URL::to('public/js/jquery.fancybox.min.js')}}"></script> 
 <!-- <script src="{{ URL::to('public/js/jquery.fancybox.js')}}"></script>  -->
<script>
  $(document).ready(function(){

      $(".preview a").on("click", function(){
          $(".selected").removeClass("selected");
          $(this).addClass("selected");
          var picture = $(this).data();
          
          event.preventDefault(); //prevents page from reloading every time you click a thumbnail


          $(".full img").fadeOut( 100, function() { 
            $(".full img").attr("src", picture.full);
            $(".full").attr("href", picture.full);
            $(".full").attr("title", picture.title);

        }).fadeIn();


      });// end on click

      $(".full").fancybox({
          helpers : {
              title: {
                  type: 'inside'
              }
          },
          closeBtn : true,
      });


  });//end doc ready
 

  </script>
  <script defer src="{{ URL::to('public/js/jquery.flexslider.js')}}"></script>
  <script type="text/javascript" src="{{ URL::to('public/js/swiper.jquery.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/jquery-ui.min.js')}}"></script>

<script>
$('#typeby').on('change', function() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
    
  var value = $(this).val();
  var token = $('input[name="_token"]').val();
  var base_url = '<?php echo url('/'); ?>';
 // alert(value + token); 
  jQuery.ajax({
    url:base_url+'/search_tour',
    method: 'POST',
    data:{type:value,_token:token},
    success: function(response){
      //console.log(response);
      var len = Object.keys(response).length;
      var return1="";
      $.each(response, function(i, myitem) {
        console.log(myitem);     
        if(myitem){
          return1 +='<div class="col-lg-3">';
          return1 +='<div class="course_inner">';
          return1 +='<a href="tour_detail/'+myitem.id+'">';
          return1 +='<img src="images/tour/'+myitem.image+'">';
          //return1 +='<span>top place to visit</span>';
          return1 +='</a>';
          return1 +='<div class="course_content">';
          return1 +='<h2>';
          return1 +='<a href="tour_detail/'+myitem.id+'">'+myitem.name+'</a>';
          return1 +='</h2>';
          //return1 +='<h3>Brand</h3>';
          return1 +='<div class="product-price">';
          return1 +='<span class="old-price">AED '+myitem.price+'</span>';
          return1 +='<span class="new-price">AED '+myitem.discount_price+'</span>';
          return1 +='<span class="tour-offer">'+myitem.trip+'</span></div>';
          return1 +='</div>';
          return1 +='</div>';
          return1 +='</div>';      
        }
      });
      return1 +='<div class="col-lg-3"></div>';
      //console.log(return1);
      $('.typesearch').html(return1);
    }
  });
});
</script>
<script>
   $(document).ready(function(){
  $('.increaseQty').on('click', function() {

    var price = $('#unit_p').text();
    var quant = $('.qtyValue').val();
    var newprice =  price.replace(/\$/g,'')
    var update ='$'+(newprice * quant);
    $('.subtotal-amount').text(update);

  });
});
</script>

<script>
   $(document).ready(function(){
  $('.decreaseQty').on('click', function() {

    var price = $('#unit_p').text();
    var quant = $('.qtyValue').val();
    var newprice =  price.replace(/\$/g,'')
    var update ='$'+(newprice * quant);
    $('.subtotal-amount').text(update);

  });
});
</script>

</body>
</html>