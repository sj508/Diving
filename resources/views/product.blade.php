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
.icon_image{
        height: 53px;
    width: 63px;
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
                                    <li class="active">Product List</li>
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
                
                            <div class="col-lg-12 p-l-0">
                          
                                <div class="stat-widget-eight">
                                    <div class="stat-header page-titles">
                                        <div class="header-title">Product manage</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#" data-toggle="modal" data-target="#add-usertype"><i class="ti-menu-alt"></i>Add Category</a></li>

                                                 <li><a href="#" data-toggle="modal" data-target="#add-subcategory"><i class="ti-menu-alt"></i>Add sub Category</a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Product</a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                      

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Product List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Short Description</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                    <td><img class="icon_image"src="images/product/{{ $user->image }}" /></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->short_description}}</td>
                                                    <td>{{$user->price}}</td>
                                                    <td>{{$user->quantity}}</td>
                                         <td class="action_btn">
                                      <!--   <a class="ac_btn" href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                        <a class="ac_btn" href="{{url('edit_product/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <a class="ac_btn" href="{{url('delete_product/'.$user->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 
                                        


                                    </td>
                                                </tr>
                                                <?php  $i++;}}} ?>
                                            </tbody>
                                        </table>
					
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

                     <!-- category MODAL -->
                            <div class="modal fade none-border" id="add-usertype">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Add Product Category</strong></h4>
                                                    </div>
                                                   
                                            <form method="POST" action="{{'create'}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <label class="control-label">Category</label>
                                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="name" required />
                                                                </div>
                                                             
                                                            </div>
                                           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                                                    </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
    <!--END MODAL -->



<!--  Sub Category MODAL -->
                            <div class="modal fade none-border" id="add-subcategory">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Add Sub Category</strong></h4>
                                                    </div>
                                                   
                                     <form method="POST" action="{{'subcreate'}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                    <div class="col-md-6">
                                                        <label class="control-label">Sub Category</label>
                                     <input class="form-control form-white" placeholder="Enter name" type="text" name="name" required=""/>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                                    </div>
                                                             
                                                            
                                    <div class="col-md-6">
                                <label class="control-label">Category</label>
                                                        
                         <select class="form-control" id="subcategory" name="subcategory" required="">
                                    <option value="">Please select</option>
                                        <?php foreach ($product_cat as $key=>$username): ?>
                                        <option value="<?php echo $username->id; ?>" <?php
                                        if (isset($subcategory) && Input::old('subcategory') == $username->name)
                                        {
                                            echo 'selected="selected"';
                                        }
                                        ?>>
                                        <?php  echo $username->name; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            @if ($errors->has('subcategory'))
                                <span class="text-danger">{{ $errors->first('subcategory') }}</span>
                                @endif

                                </div>
                         </div>                     
                                
                                           
                                     </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                                                    </div>
                                                    </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
    <!--END MODAL -->





 <!--MODAL -->
    <div style="z-index: 9999;" class="modal fade none-border" id="add-users">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Product</strong></h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{'addproduct'}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">

                  <div class="col-md-6">
                     <label class="control-label">Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">Brand</label>
                     <input class="form-control form-white" placeholder="brand name" type="text" name="brand" required=""/>
                  </div>

                </div>


               <div class="row">
                <div class="col-md-6">
                   <label class="control-label">Description</label>
                   <!-- <input class="form-control form-white" placeholder="Enter description" type="text" name="description" required=""/> -->
                    <textarea rows="1" cols="10" class="form-control" placeholder="Enter description" type="text" name="description" required="" ></textarea>
                </div>

                  <div class="col-md-6">
                   <label class="control-label"> Short Description</label>
                
                   <textarea rows="1" cols="10" class="form-control" placeholder="Enter short description" type="text" name="short_description" required="" ></textarea> 
                </div>
              </div>

                <div class="row">
                  <div class="col-md-6">
                     <label class="control-label">Price</label>
                     <input class="form-control form-white" placeholder="Enter price" type="text" name="price" required=""/>
                  </div>


                  <div class="col-md-6 disc_prcnt">
                     <label class="control-label">Discount Percentage</label>
                     <input class="form-control form-white" value="0" type="number" name="discount_percentage" required=""/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                     <label class="control-label">Category</label>
                     <select class="form-control" id="category_id" name="category_id" required="">
                        <option value="">Please select</option>
                        <?php foreach ($product_cat as $key=>$username): ?>
                        <option value="<?php echo $username->id; ?>" <?php
                           if (isset($category_id) && Input::old('category_id') == $username->name)
                           {
                               echo 'selected="selected"';
                           }
                           ?>>
                           <?php  echo $username->name; ?>
                        </option>
                        <?php endforeach; ?>
                     </select>
                  </div>

                                         

                  <div class="col-md-6">
                     <label class="control-label">Sub Category</label>
                     <select class="form-control" id="subcategory_id" name="subcategory_id" required="">
                        <option value="">Please select</option>
                        <?php foreach ($product_cat as $key=>$username): ?>

                     <option value="<?php echo $username->id; ?>" <?php
                           if (isset($subcategory_id) && Input::old('subcategory_id') == $username->name)
                           {
                               echo 'selected="selected"';
                           }
                           ?>>
                           <?php  echo $username->name; ?>
                        </option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                </div>

                  <div class="row">
                  <div class="col-md-6 disc_prcnt">
                     <label class="control-label">Quantity</label>
                     <input class="form-control form-white" value="1" type="number" name="quantity" required=""/>
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">Image</label>
                     <input class="form-control form-white" type="file" name="img" required=""/>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-6">
                     <label class="control-label" style="display: block;">Type</label>
                    <input type="checkbox" name="type[]" value="0"><label class="custom-control-label">Rent </label>
                     <input type="checkbox" name="type[]" value="1"><label class="custom-control-label" required="">Purchase</label> 
                </div>
              
 
                 

                    <div class="col-md-6">
                     <label class="control-label" style="display: block;">product Type</label>
                    <input type="checkbox" name="section_type[]" value="0"><label class="custom-control-label" required="">New Arrival </label>
                     <input type="checkbox" name="section_type[]" value="1"><label class="custom-control-label" required="">Popular</label>
                    <input type="checkbox" name="section_type[]" value="2"><label class="custom-control-label" >Top Product</label> 
                </div>

                 
              
                  <!-- </div> -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                         
                 <!-----END MODAL -->
<script>
  /**
 * Chosen: Multiple Dropdown
 */
window.WDS_Chosen_Multiple_Dropdown = {};
( function( window, $, that ) {

  // Constructor.
  that.init = function() {
    that.cache();

    if ( that.meetsRequirements ) {
      that.bindEvents();
    }
  };

  // Cache all the things.
  that.cache = function() {
    that.$c = {
      window: $(window),
      theDropdown: $( '.dropdown' ),
    };
  };

  // Combine all events.
  that.bindEvents = function() {
    that.$c.window.on( 'load', that.applyChosen );
  };

  // Do we meet the requirements?
  that.meetsRequirements = function() {
    return that.$c.theDropdown.length;
  };

  // Apply the Chosen.js library to a dropdown.
  // https://harvesthq.github.io/chosen/options.html
  that.applyChosen = function() {
    that.$c.theDropdown.chosen({
      inherit_select_classes: true,
      width: '300px',
    });
  };

  // Engage!
  $( that.init );

})( window, jQuery, window.WDS_Chosen_Multiple_Dropdown );
</script>
   @include('layouts.footer')