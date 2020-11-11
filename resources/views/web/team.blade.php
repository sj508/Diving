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
    @if($banners->page_id == 2)
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
<section id="team">
   <div class="container">
      <div class="single_page_title">
         <h2>behind the scenes</h2>
         <p>a team of bright professional</p>
      </div>
      <div class="row">
        @if(!empty($ourteam))
        @foreach($ourteam as $team)
         <div class="col-lg-3 col-sm-6">
            <div class="trainer-card">
               <img src="{{url('/images/ourteam/'.$team->image)}}" alt="Trainers Images">
               <div class="trainer-content">
                  <h3>{{$team->name}}</h3>
                  <span>{{$team->designation}}</span>
                  <div class="social-icon">
                     <ul>
                        <li>
                           <a href="{{$team->linkdin}}" target="_blank">
                           <i class="fab fa-linkedin-in"></i>
                           </a>
                        </li>
                        <li>
                           <a href="{{$team->facebook}}" target="_blank">
                           <i class="fab fa-facebook-f"></i>
                           </a>
                        </li>
                        <li>
                           <a href="{{$team->twitter}}" target="_blank">
                           <i class="fab fa-twitter"></i>
                           </a>
                        </li>
                        <li>
                           <a href="mailto:{{$team->email}}" target="_blank">
                           <i class="fas fa-envelope"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
        @endforeach
       @endif 
      
      </div>
   </div>
</section>
@include('layouts.footer1')