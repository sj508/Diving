@include('layouts.header')
<style>
  .img-1{
    width: 200px;
    display: inline-block;
    float: left;
    margin-right: 10px;
    }
</style>
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit banner</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </div>
        </div>
  

                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif



<!-----Start gallery upload -->

                     <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Page Banner</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                      <?php 
                      $multi = array();
                      $multi =  explode(',', $banner->image);
                      ?>
                      <div class="col-md-12 text-centerr">
                        @foreach($multi as $info)
                        <img src="{{url('/images/banner/'.$info)}}" class="img-responsive img-1">
                        @endforeach
                    </div>


  <section class="form">
  <div class="container">
   <form method="POST" action="{{url('post_edit_banner')}}" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
    <input value="{{$banner->id}}" type="hidden" name="id"/>

    <div class="form-group col-md-8"  style="margin-top: 50px;">
       <label class="control-label">Heading</label>
       <input class="form-control form-white" value="{{$banner->heading}}" placeholder="Enter Name" type="text" name="heading" required="" />
    </div>

    <div class="form-group col-md-8">
       <label class="control-label">Short Description</label>
      <textarea rows="3" cols="10" class="form-control" placeholder="Enter description" type="text" name="short_description" required="" >{{$banner->short_description}}</textarea> 
    </div> 

      <div class="form-group col-md-8">
         <label class="control-label">Banner Images</label>
         <input class="form-control form-white" onchange="Upload();" type="file" id="fileUpload" name="img[]" placeholder="select image" multiple />
          <span id="file_err" style="color:red;font-weight:bold; display:none;"></span>
        
   </div>


 </div>
<div class="form-group col-md-6">
  <button type="submit" class="btn btn-lg btn-primary">upload</button>
</div>
    </form>

  </div>

</section>
</div>
</div>
  </div>
    @include('layouts.footer')    


