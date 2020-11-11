@include('layouts.header')

   <style>
       .img-1{
        width: 100px;
        margin: 0 auto;
       }
       .text-centerr{
        margin: 20px 0px;
       }
       .ex-including input{
         width: 150px !important;
        float: left;
       }
       .disc_per .input-group-prepend{
            display: inline-block;
            float: left;
       }
       .disc_per input{
        width: 172px !important;
        float: left;
       }
       .disc_per .input-group-append{
        display: inline-block;
       }
       .including input{
        width: 200px;
         float: left;

       }
       .inline-block{
        display: inline-block;
       }
       .jinput{
        margin: 0 auto;

       }

      #More {
    background: #D6050D;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 6px 15px;
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
                                    <li class="active">edit boat</li>
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
                                    <h4>Edit Boat</h4>
                                   
                                </div>


                                <div class="col-md-12 text-centerr">
                                    <img src="{{url('/images/boat/'.$product->image)}}" class="img-responsive img-circle img-1">
                                </div>
                                <div class="card-body">
                                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_boat')}}" enctype="multipart/form-data">
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
                                                <label class="col-sm-2 control-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="price" class="form-control" placeholder="enter price" value="{{$product->price}}">
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Discount Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="discount_price" class="form-control" placeholder="enter price" value="{{$product->discount_price}}" readonly="">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                             <label class="col-sm-2 control-label">Boat Size</label>
                                             <div class="col-sm-10">
                                             <input type="text" name="size" class="form-control" placeholder="Enter speed" value="{{$product->size}}">
                                          </div>
                                        </div>

                                            <div class="form-group disc_per">
                                                <label class="col-sm-2 control-label">Discount Percentage</label>
                                                <div class="col-sm-3">
                                                    <input type="number" name="discount_percent" class="form-control" placeholder="enter price" value="{{$product->discount_percent}}">
                                                </div>


                                        <div class="form-group col-sm-6">
                                             <label class="col-sm-3 control-label">Persons</label>
                                             <input class="form-control form-white" type="number" name="person" value="{{$product->person}}" min="0" max="100"  step="1"/>
                                          </div>

                                         
                                            <div class="form-group col-sm-6">
                                             <label class="col-sm-4 control-label">Chair</label>
                                             <input class="form-control form-white" type="number" name="chair" value="{{$product->chair}}" min="0" max="100"  step="1"/>
                                          </div>
                                      

                                           
                                           <div class="form-group col-sm-6">
                                             <label class="col-sm-2 control-label">Speed</label>
                                             <input type="text" name="speed" class="form-control" placeholder="Enter speed" value="{{$product->speed}}">
                                          </div>

                                          
                                  
 

                                         <div class="form-group including">
                                            <div id="fieldList">
                                                  <?php 
                                                    $inculde = array();
                                                    $inculde =  explode(',', $product->specifications);
                                                    ?>
                                                 <label class="col-sm-2 control-label">Specifications</label>
                                                  <div class="col-sm-10" id="field_inner"> @foreach($inculde as $info)
                                                 <input type="text" name="specifications[]" id="specifications" class="form-control" value="{{$info}}" placeholder="title: text">
                                                  @endforeach                                           
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10"> <button id="More"><i class="ti-plus"></i> Add More</button></div>
                                             </div>
                                         </div>
                       

                                        <div class="col-sm-12">
                                         <label class="col-sm-2 control-label">Location</label>
                                         <input class="form-control form-white" onkeyup="checktext();getlatLong();" placeholder="Enter location" type="text" name="location" value="{{$product->location}}" id="address" required=""/>
                                     
                                       </div>
                                        <!-- <input type="hidden" name="location" id="location"> -->
                                         <input type="hidden" name="lat" id="lat">
                                         <input type="hidden" name="lng" id="lng">

                                        <div class="form-group col-sm-6">
                                          <button class="btn btn-primary" id="getmapbtn" style="display:none">Get Map</button>
                                        </div>
                                        <div class="col-sm-6">
                                         <div class="map" id="map" style="width: 100%; height: 300px;display:none"></div>
                                     </div>
                                  
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

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card alert">
                                         <div class="card-header">
                                            <h4>Gallery Boat</h4>
                                   
                                            </div>
                                            <br>
                                         <?php 
                                        $multi = array();
                                        $multi =  explode(',', $gallery[0]->image);

                                        ?>
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_gallery')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <input type="hidden" name="id" value="{{$product->id}}">
                                    <div class="form-group">
                                         <label class="col-sm-2 control-label">Gallery Image</label>
                                         <div class="col-sm-10">
                                         <input class="form-control" type="file" name="img[]" multiple="" required="" />
                                     </div>

                                    </div>

                                 @foreach($multi as $multiimage)
                                    <div class="col-sm-1">
                                     <img src="{{url('/images/boat'.$multiimage)}}" class="img-responsive img-1">
                                     
                                  </div>
                                   @endforeach 

                                   <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
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

       