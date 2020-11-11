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
#addMores,#addMore {
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
                                    <li class="active">add tour</li>
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
                                    <h4>Add Tour </h4>  
                                </div>
                                <form method="POST" action="{{'addtour'}}" enctype="multipart/form-data">
               {{ csrf_field() }}
              
            

          
                <div class="row">
                     <div class="col-md-6">
                     <label class="control-label">Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Price</label>
                     <input class="form-control form-white" id="price" placeholder="Enter price" type="text" name="price" required=""/>
                  </div>

                   <div class="col-md-6 disc_prcnt">
                     <label class="control-label">Discount Percentage</label>
                     <input class="form-control form-white" id="discount_percent" value="0" min="0" max="100" type="number" name="discount_percent" required="" />
                  </div>


                  <div class="col-md-3 disc_prcnt">
                     <label class="control-label">child</label>
                     <input class="form-control form-white" type="number" name="child" value="0" min="0" max="100" step="1"/>
                  </div>

                  <div class="col-md-3 disc_prcnt">
                     <label class="control-label">Adult</label>
                     <input class="form-control form-white" type="number" name="adult" value="1" min="0" max="100" step="1"/>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Trip</label>
                   <select class="form-control form-white" name="trip" required="" >
                          <option value="">Seleted please</option>
                          <option value="Round Trip">Round Trip</option>
                          <option value="Single Trip">Single Trip</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Type</label>
                   <select class="form-control form-white" name="type" required="" >
                          <option value="">Seleted please</option>
                          <option value="Inside Kuwait">Inside Kuwait</option>
                          <option value="Outside Kuwait">Outside Kuwait</option>
                    </select>
                  </div>

               <div id="fieldList">
                   <div class="col-md-8" id="fieldList_inner">
                     <label class="control-label">Including</label>
                     <input type="text" name="including[]" id="including" class="form-control" placeholder="title: text">                   
                  </div>
                   <div class="col-md-12">
                     <button id="addMore">+ Add more</button>
                     </div>        
                 </div>


               <div id="fieldLists">
                   <div class="col-md-8" id="fieldLists_inner">
                     <label class="control-label">Ex-Including</label>
                     <input type="text" name="exincluding[]" id="exincluding" class="form-control" placeholder="title: text">
                  </div>
                  <div class="col-md-12">
                     <button id="addMores">+ Add more</button>
                     </div>
                 </div>
                </div>
         


                 
                     <div class="row">
                     <div class="col-md-6">
                     <label class="control-label">Image</label>
                     <input class="form-control form-white" type="file" name="img" required=""/>
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">Gallery Image</label>
                     <input class="form-control form-white" type="file" name="gallery_img[]" required="" multiple="" />
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
                     <input class="form-control form-white" onkeyup="checktext();getlatLong();" placeholder="Enter location" type="text" name="address" id="address" required=""/>
                 
                   
                     <input type="hidden" name="location" id="location">
                     <input type="hidden" name="lat" id="lat">
                     <input type="hidden" name="lng" id="lng">
                      <button class="btn btn-primary" id="getmapbtn" style="display:none">Get Map</button>
                     <div class="map" id="map" style="width: 100%; height: 300px;display:none"></div>
                </div>

                  <div class="col-md-6">
                     <label class="control-label">Required Accessories</label>
                     <select class="form-control" id="required_accessories" name="required_accessories[]" required="" multiple="">
                    <option value="">Please select</option>
                        <?php foreach ($required_accessories as $key=>$username): ?>
                        <option value="<?php echo $username->id; ?>" <?php
                        if (isset($required_accessories) && Input::old('required_accessories') == $username->name)
                        {
                            echo 'selected="selected"';
                        }
                        ?>>
                        <?php  echo $username->name; ?></option>
                        <?php endforeach; ?>
                    </select>
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