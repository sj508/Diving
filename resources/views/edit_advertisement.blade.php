@include('layouts.header')
<style>
  .disc_prcnt .input-group-prepend{
  display: inline-block;
}
.disc_prcnt .form-white{
  width: 90px;
    display: inline-block;
    float: none;
}
.disc_prcnt .input-group-append{
  display: inline-block;
}
.add-panel{background: #fdca01; padding: 20px 20px 30px; width: 850px; margin: 0 auto;}
.add-panels{background: #ED1C24; padding: 20px 20px 30px; width: 850px; margin: 0 auto;}
.add-title {
    text-align: right; position: relative;
    font-size: 30px;
    text-transform: uppercase;
    font-weight: 500;
    padding-left: 25px;
    line-height: 40px;
    padding-right: 25px;
}
.add-logo {
    width: 120px;
position: absolute;
bottom: -20px;
left: 125px;
}
.add-title span {
    font-size: 50px;
    letter-spacing: -3px;
    font-weight: 800;
    margin: 0 20px;
}
.form{
  padding-top: 40px;
  margin-left: 20px;
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
                                    <li class="active">edit advertisement</li>
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
                                    <h4>Edit Advertisement</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>

          @if($add_list->discount_percentage)
          <div class="add-panel">
            <div class="row">
            <div class="col-md-12">
              <div class="add-title">
                <img src="{{ URL::to('public/images/logo.png')}}" class="add-logo">{{$add_list->title}} <span>{{$add_list->discount_percentage}}% Off</span> {{$add_list->short_description}}</div>
              </div>
            
          </div>
          </div>
          @else
            <div class="add-panels">
            <div class="row">
            <div class="col-md-12">
              <div class="add-title">
                <img src="{{ URL::to('public/images/logo.png')}}" class="add-logo"> {{$add_list->title}} <span>@ {{$add_list->price}} KWD</span> {{$add_list->short_description}}</div>
              </div>
          </div>
          </div>
        @endif



                      
                        <section class="form">
  <div class="container">
   <form method="POST" action="{{url('post_edit_advertisement')}}" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
   
      <input value="{{$add_list->page_id}}" type="hidden" name="page_id" required="" />
      <input value="{{$add_list->id}}" type="hidden" name="id" required="" />

    <div class="form-group col-md-8">
       <label class="control-label">Title</label>
       <input class="form-control form-white" placeholder="Enter Name" value="{{$add_list->title}}" type="text" name="title" required="" />
    </div>

     <div class="form-group col-md-6 disc_prcnt">
       <label class="control-label">price</label>
       <input class="form-control form-white" value="{{$add_list->price}}" type="number" name="price"/>
    </div>

    <div class="form-group col-md-6 disc_prcnt">
       <label class="control-label">Discount Percentage</label>
       <input class="form-control form-white" value="{{$add_list->discount_percentage}}" type="number" name="discount_percentage" />
    </div>

    <div class="form-group col-md-8">
       <label class="control-label">Short Description</label>
      <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="short_description" required="" >{{$add_list->short_description}}</textarea> 
    </div> 

  

 </div>
<div class="form-group col-md-6">
  <button type="submit" class="btn btn-lg btn-primary">Update</button>
</div>
    </form>

  </div>

</section>
</div>
</div>
  </div>
    @include('layouts.footer')    


