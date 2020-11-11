@include('layouts.header')
<style>
  .img-1{
    display: inline-block;
    float: left;
    margin-right: 10px;
    }
  .img02{
      width: 169px;
      height: 90px;
    }
  .image01{
   position: relative;
    width: 169px;
    display: inline-block;
    margin-right: 5px;
  }
  .image01 a{
    position: absolute;
    top: 0;
    right: 0;
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
                                    <li class="active">gallery</li>
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
                                    <h4>Gallery</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-12 text-centerr">
                        @if($gallery)
                        @foreach($gallery as $info)
                        <?php 
                          $multi = array();
                          $multi =  explode(',', $info->image);
                          ?>
                          @foreach($multi as $infos)
                            <div class="image01">
                              <img src="{{url('/images/gallery/'.$infos)}}" class="img-responsive img-1 img02">  
                              <a href="{{url('delete_gallery/'.$info->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>
                            </div>
                         @endforeach
                         @endforeach
                         @endif
                   </div>
                   


                      </div>
                  <section class="form">
                    <div class="container">
                  <form method="POST" action="{{url('upload_gallery')}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="row">
                  

                  <div class="form-group col-md-8" style="margin-top: 50px;">
                     <label class="control-label">Gallery Image</label>
                     <input required class="form-control form-white" type="file" name="img[]" placeholder="select image" multiple />
                       @if ($errors->has('img'))
                      <span class="text-danger">{{ $errors->first('img') }}</span>
                      @endif
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


