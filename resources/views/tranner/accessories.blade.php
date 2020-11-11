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
                                    <li class="active">accessories request</li>
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
                                        <div class="header-title">Accessories Request</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                              
                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Request</a></li>
                                               
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
                                    <h4>Diving Accessories Request </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Courses Name</th>
                                                    <th>Accessories Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                   
                                                    <td>{{$user->cour_name}}</td>
                                                     <td>{{$user->accessories_name}}</td>
                                                    <td>{{$user->description}}</td>
                                                     <td>{{$user->quantity}}</td>
                                                      <td>{{$user->priority}}</td>
                                                     <td>
                                                         <?php if($user->status == 1){ ?>
                                                           <a class="btn label-primary btn-rounded" href="#" data-toggle="modal" >Pending</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->status == 0) { ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Cancel</a>
                                                        <?php
                                                        }
                                                        elseif ($user->status == 2) { ?>
                                                            <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Accept</a>
                                                        <?php
                                                        }
                                                        
                                                        else{ ?>
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>
                                                        <?php 
                                                        }
                                                        ?>
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

                   
 <!--MODAL -->
    <div class="modal fade none-border" id="add-users">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Request</strong></h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{url('request_accessories')}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">

                  <div class="col-md-6">
                     <label class="control-label">Course Name</label>
                     <select class="form-control" id="courses_name" name="courses_name" required="">
                        <option value="">Please select</option>
                            <?php foreach ($courses as $key=>$username): ?>
                            <option value="<?php echo $username->courses_id; ?>" <?php
                            if (isset($courses_name) && Input::old('courses_name') == $username->courses_name)
                            {
                                echo 'selected="selected"';
                            }
                            ?>>
                            <?php  echo $username->courses_name; ?></option>
                            <?php endforeach; ?>
                    </select>
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">Accessories Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="accessories_name" required="" />
                  </div>

                   
                  <div class="col-md-6 discount_per">
                     <label class="control-label">Quantity</label>
                     <input class="form-control form-white" value="1" type="number" name="quantity" required=""/>
                  </div>

                   <div class="col-md-6">
                     <label class="control-label">Description</label>
                      <textarea rows="3" cols="10" class="form-control" placeholder="Enter description" type="text" name="description" required="" ></textarea> 
                  </div>

                <div class="col-md-6">
                <label class="control-label">Priority</label>
                 <select class="form-control" name="priority" id="priority" required="">
                  <option value="">selected priority</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
                </div>


              </div>

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
 @include('layouts.footer')