@include('layouts.header')

   <style>
       .img-1{
        width: 100px;
        margin: 0 auto;
       }
       .text-centerr{
        margin: 20px 0px;
       }
       .discount_per .input-group-prepend{
            display: inline-block;
            float: left;
        }
        .discount_per .disc{
            width: 115px;
        }
        .discount_per .input-group-append{
            display: inline-block;
        }
   </style>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                       <!--  <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div> -->
                    </div>

                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit courses</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                <!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Diving Courses</h4>
                                   
                                </div>


                                <div class="col-md-12 text-centerr">
                                    <img src="{{url('/images/courses/'.$product->image)}}" class="img-responsive img-circle img-1">
                                </div>
                                <div class="card-body">
                                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_courses')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <input type="hidden" name="id" value="{{$product->id}}">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Upload Image</label>
                                                <div class="col-sm-10">
                                                <div class="form-control file-input dark-browse-input-box">
                                            <input class="file-name input-flat" type="file" name="img" placeholder="Browse Files">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" placeholder="Type your name" value="{{$product->name}}">
                                                </div>
                                            </div>

                                            


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="description" class="form-control" placeholder="enter description" value="{{$product->description}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Short Description</label>
                                                <div class="col-sm-10">

                                                    <textarea rows="1" cols="10" class="form-control" placeholder="Enter short description" type="text" name="short_description" required="" >{{$product->short_description}}</textarea> 
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Tranning Place</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tranning_place" class="form-control" placeholder="enter place" value="{{$product->tranning_place}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="price" class="form-control" placeholder="enter price" value="{{$product->price}}">
                                                </div>
                                            </div>

                                            <div class="form-group discount_per">
                                                <label class="col-sm-2 control-label">Discount Percentage</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="discount_percent" class="form-control disc" placeholder="enter price" value="{{$product->discount_percent}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Discount Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="discount_price" class="form-control" placeholder="enter price" value="{{$product->discount_price}}" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group discount_per">
                                                <label class="col-sm-2 control-label">Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="quantity" class="form-control disc" placeholder="enter quantity" value="{{$product->quantity}}">
                                                </div>
                                            </div>
<!-- 
                                              <div class="form-group discount_per">
                                                <label class="col-sm-2 control-label">Certification</label>
                                                <div class="col-sm-10">
                                                   <select class="form-control" id="certification" name="certification" required="">
                                                    <option value="">Please select</option>
                                                    @foreach($certification as $certifi)
                                                     <option value="{{$certifi->name}}" {{ $certifi->name == $product->certification ? 'selected' : '' }}>{{$certifi->name}}</option>
                                                     @endforeach
                                                  </select>
                                                </div>
                                            </div> -->

                                          

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </div>
                <!-- /# main content -->
            </div>
            <!-- /# container-fluid -->
        </div>
        <!-- /# main -->
    </div>
    <!-- /# content wrap -->
@include('layouts.footer')

       