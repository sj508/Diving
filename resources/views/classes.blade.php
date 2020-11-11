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
.discount_per .input-group-prepend{
    display: inline-block;
    float: left;
}
.discount_per .form-white{
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
                                    <li class="active">classes List</li>
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
                                        <div class="header-title">Classes manage</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                              
                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Create Classes</a></li>
                                               
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
                                    <h4>Diving Classes List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Courses Name</th>
                                                    <th>Tranner Name</th>
                                                    <th>Location</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                     <th>Tranner Status</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->cour_name}}</td>
                                                    <td>{{$user->tra_name}}</td>
                                                    <td>{{$user->location}}</td>
                                                    <td>{{$user->start_date}}</td>
                                                    <td>{{$user->end_date}}</td>
                                                     <td>
                                                        <?php if($user->tranner_status == 0){ ?>
                                                           <a class="btn label-primary btn-rounded" href="#" data-toggle="modal" >Pending</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->tranner_status == 1) { ?>
                                                            <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Attend</a>
                                                        <?php
                                                        }
                                                         elseif ($user->tranner_status == 2) { ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Not Attend</a>
                                                        <?php
                                                        }
                                                        else{ ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Not Found?</a>
                                                        <?php 
                                                        }
                                                        ?>
                                                     </td>
                                                     <td>
                                                         <?php if($user->status == 1){ ?>
                                                           <a class="btn btn-success btn-rounded" href="#" data-toggle="modal" >Active</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->status == 0) { ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Inactive</a>
                                                        <?php
                                                        }
                                                        
                                                        else{ ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Not Found?</a>
                                                        <?php 
                                                        }
                                                        ?>
                                                     </td>
                                                  <td class="action_btn">
                                                    <?php if($user->status == 1){ ?>
                                                           <a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="{{'#status_customer'.$user->id}}"  href="" data-toggle="modal" >Inactive</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->status == 0) { ?>
                                                            <a class="btn btn-success btn-rounded" data-toggle="modal" data-target="{{'#status_customeractive'.$user->id}}" href="" data-toggle="modal">Active</a>
                                                        <?php
                                                        }
                                                        else{ ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>
                                                        <?php 
                                                         }
                                                        ?> 

                                        <a class="ac_btn" href="{{url('edit_classes/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_courses'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 
                                        


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
                   
                </div>
            </div>
        </div>
    </div>

                   
 <!--MODAL -->
    <div class="modal fade none-border" id="add-users">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Classes</strong></h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{'addclasses'}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">

                  <div class="col-md-6">
                     <label class="control-label">Class Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="class_name" required="" />
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Course Name</label>
                     <select class="form-control" id="courses_name" class="courses_name" name="courses_name" required="">
                    <option value="">Please select</option>
                        <?php foreach ($courses as $key=>$username): ?>
                        <option value="<?php echo $username->id; ?>" <?php
                        if (isset($courses_name) && Input::old('courses_name') == $username->name)
                        {
                            echo 'selected="selected"';
                        }
                        ?>>
                        <?php  echo $username->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Tranning name</label>
                      <select class="form-control" id="tranner_name" name="tranner_name" required="">
                    <option value="">Please select</option>
                        <?php foreach ($tranner as $key=>$username): ?>
                        <option value="<?php echo $username->id; ?>" <?php
                        if (isset($tranner_name) && Input::old('tranner_name') == $username->name)
                        {
                            echo 'selected="selected"';
                        }
                        ?>>
                        <?php  echo $username->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>


                   <div class="col-md-6">
                     <label class="control-label">location</label>
                     <div id="show_l">
                     <input class="form-control form-white" value="" placeholder="Enter place" type="text" name="location" required="" readonly/>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Start Date</label>
                     <input class="form-control form-white" id="start_date" placeholder="Enter place" type="date" name="start_date" required=""/>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Start Time</label>
                     <input class="form-control form-white" placeholder="Enter place" type="time" name="start_time" required=""/>
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">END Date</label>
                     <input class="form-control form-white" id="end_date" placeholder="Enter place" type="date" name="end_date" required=""/>
                    <span id="date_error"></span>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">End Time</label>
                     <input class="form-control form-white" placeholder="Enter place" type="time" name="end_time" required=""/>
                  </div>
         
              </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light save-category class_sub">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                         
                 <!-----END MODAL -->

<!--MODAL -->
                             @if(!empty($users))
                            @foreach($users as $key => $user) 
                            <div class="modal fade none-border" id="{{'status_customer'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Inactive Classes</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Classes Inactive??</h2>
                                        <p>Are you Sure you want to Inactive it?</p>
                                             </div>         
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('status_changeclasses/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                         @endforeach
                                         @endif
    <!--END MODAL -->
    
     <!--MODAL -->
                                 @if(!empty($users))
                                 @foreach($users as $key => $user)
                            <div class="modal fade none-border" id="{{'status_customeractive'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Active Classes</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Classes Active??</h2>
                                        <p>Are you Sure you want to Active it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('status_changeclasses/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
    <!--END MODAL -->


 <!--MODAL -->
                                 @if(!empty($users))
                                 @foreach($users as $key => $user)
                            <div class="modal fade none-border" id="{{'delete_courses'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete Classes</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Classes Delete??</h2>
                                        <p>Are you Sure you want to Delete it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_classes/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
    <!--END MODAL -->



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