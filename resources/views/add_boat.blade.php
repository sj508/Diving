@include('layouts.header')
<style>
    .three-dot{
  left: 0!important;
  top: 7px;
}
.page-titles{
  text-align: right;
}
.page-titles .header-title{
  display: inline-block;
    text-align: right;
}
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
#More {
    background: #D6050D;
    color: #fff;margin-bottom: 10px;
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
                                    <li class="active">add boat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                            <!-- ADD GROUP  -->
                
                          
                        

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Add Boat </h4>  
                                </div>
                                <form method="POST" action="{{'addboat'}}" enctype="multipart/form-data">
               {{ csrf_field() }}
              
            

          
                <div class="row">
                     <div class="col-md-6">
                     <label class="control-label">Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
                  </div>

                   <div class="col-md-6 disc_prcnt">
                     <label class="control-label">Person</label>
                     <input class="form-control form-white" type="number" name="person" value="0" min="0" max="100" step="1" required="" />
                  </div>

                  <div class="col-md-3 disc_prcnt">
                     <label class="control-label">Price</label>
                     <input class="form-control form-white" id="price" value="0" type="number" name="price" required=""/>
                  </div>

                   <div class="col-md-3 disc_prcnt">
                     <label class="control-label">Discount Percentage</label>
                     <input class="form-control form-white" id="discount_percent" value="0" min="0" max="100" type="number" name="discount_percent" required="" />
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Boat Size</label>
                     <input class="form-control form-white" placeholder="Enter Size In M" type="text" name="size" required="" />
                  </div>

               <div id="fieldList">
                   <div class="col-md-8" id="field_inner">
                     <label class="control-label">Specifications</label>
                     <input type="text" name="specifications[]" id="specifications" class="form-control" placeholder="title: text" required="">                   
                  </div>
                   <div class="col-md-12">
                     <button id="More">+ Add more</button>
                     </div>        
                 </div>

                 <div class="col-md-3">
                     <label class="control-label">Speed</label>
                     <input class="form-control form-white" placeholder="Enter speed" type="text" name="speed" required="" />
                  </div>

                   <div class="col-md-3 disc_prcnt">
                     <label class="control-label">chair</label>
                     <input class="form-control form-white" type="number" name="chair" value="0" min="0" max="100" step="1" required="" />
                  </div>

                <div class="col-md-6">
                     <label class="control-label">Image</label>
                     <input class="form-control form-white" type="file" name="img" required=""/>
                  </div>
              
             </div>

            
                <div class="row">
                    <div class="col-md-12">
                     <label class="control-label">Description</label>
                      <textarea name="description" id="descriptions" placeholder="Description" class="form-control" required=""></textarea>
  
                    </div>

                   <div class="col-md-6">
                     <label class="control-label"> Short Description</label>
                  
                     <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="short_description" required="" ></textarea> 
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Location</label>
                     <input class="form-control form-white" onkeyup="checktext();getlatLong();" placeholder="Enter location" type="text" name="location" id="address" required=""/>
                 
                   
                    <!-- <input type="hidden" name="location" id="location"> -->
                     <input type="hidden" name="lat" id="lat">
                     <input type="hidden" name="lng" id="lng">
                      <button class="btn btn-primary" id="getmapbtn" style="display:none">Get Map</button>
                     <div class="map" id="map" style="width: 100%; height: 300px;display:none"></div>
                </div>

                

                 </div>
          

               <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
               </div>
            </form>




                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

   @include('layouts.footer')