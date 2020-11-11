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
    @if($banners->page_id == 11)
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

<section id="contact_panel">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="col-md-12">
               <h2 style="margin-bottom: 30px">Get in touch</h2>
            </div>
            
             @if (Session::has('message'))
               <div style="color: #16ec08; text-align: center;">{{ Session::get('message') }}</div>
            @endif

            <div class="contact-form">

              <form method="POST" action="{{url('contact_us')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                      <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name" required="">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group"><input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name" required=""></div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Enter Your Email" required=""></div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group"><input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone" required=""></div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group"><textarea class="form-control" name="comment" placeholder="Enter Your Message" required=""></textarea></div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group"><input type="submit" class="btn primary-btn" value="Submit"></div>
                  </div>
               </div>
          </form> 

            </div>
         </div>
         <div class="col-md-6">
            <div class="box-info box-info-indent">
               <h3 class="tt-title">Contact Info</h3>
               <p> LaFontaine Cadillac Buick GMC in Michigan has a strong  </p>
               <div class="tt-item-layout">
                  <div class="tt-item">
                     <div class="tt-col">
                        <h6 class="tt-title">Office Address:</h6>
                        3261 Anmoore Road Brooklyn, NY 11230
                     </div>
                  </div>
                  <div class="tt-item">
                     <div class="tt-col">
                        <h6 class="tt-title"> Service Department Address:</h6>
                        3261 Anmoore Road, Brooklyn, NY 11230
                     </div>
                  </div>
                  <div class="tt-item">
                     <div class="tt-col">
                        <h6 class="tt-title"> Call Center:</h6>
                        800-123-4567
                     </div>
                  </div>
                  <div class="tt-item">
                     <div class="tt-col">
                        <h6 class="tt-title">E-mail:</h6>
                        information@dive36.com
                     </div>
                  </div>
                  <div class="tt-item">
                     <ul class="tt-social-icon">
                        <li> <a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.829986131271!2d-122.4746968033092!3d37.80374752160443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808586e6302615a1%3A0x86bd130251757c00!2sStorey+Ave%2C+San+Francisco%2C+CA+94129!5e0!3m2!1sen!2sus!4v1435826432051" style="border: 0px none; pointer-events: none;" allowfullscreen="" width="100%" height="450" frameborder="0"></iframe>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@include('layouts.footer1')