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
                                    <li class="active">view advertisement</li>
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
                          
                             
                            </div>
                      

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>View Advertisement</h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Page Name</th>
                                                    <th>Title</th>
                                                    <th>Short Description</th>
                                                    <th>Price</th>
                                                    <th>Discount Percentage</th>
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
                                                    <td>
                                                      <?php if($user->page_id == 1){ ?>
                                                           <a>Home</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->page_id == 2) { ?>
                                                            <a>Our Team</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 3) { ?>
                                                            <a>Boat Listing</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 4) { ?>
                                                            <a>Boat Detail</a>
                                                        <?php
                                                        }
                                                        elseif ($user->page_id == 5) { ?>
                                                            <a>Diving Courses</a>
                                                        <?php
                                                        }
                                                        elseif ($user->page_id == 6) { ?>
                                                            <a>Diving Courses Detail</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 7) { ?>
                                                            <a>Tour Listing</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 8) { ?>
                                                            <a>Tour Detail</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 9) { ?>
                                                            <a>Store Listing</a>
                                                        <?php
                                                        }
                                                          elseif ($user->page_id == 10) { ?>
                                                            <a>Store Detail</a>
                                                        <?php
                                                        }
                                                          elseif ($user->page_id == 11) { ?>
                                                            <a>Contact us</a>
                                                        <?php
                                                        }
                                                        else{ ?>
                                                            <a>Page Not Found?</a>
                                                        <?php 
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>{{$user->title}}</td>
                                                    <td>{{$user->short_description}}</td>
                                                    <td>{{$user->price}}</td>
                                                    <td>{{$user->discount_percentage}}</td>
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
                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>
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
                                        <a class="ac_btn" href="{{url('edit_advertisement/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                           <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_adver'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                              
                                        


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
                             @if(!empty($users))
                            @foreach($users as $key => $user) 
                            <div class="modal fade none-border" id="{{'status_customer'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Inactive Advertisement</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Advertisement Inactive??</h2>
                                        <p>Are you Sure you want to Inactive it?</p>
                                             </div>         
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('status_advert/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
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
                                                        <h4 class="modal-title"><strong>Active Advertisement</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Advertisement Active??</h2>
                                        <p>Are you Sure you want to Active it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('status_advert/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
    <!--END MODAL -->



                                 @if(!empty($users))
                                 @foreach($users as $key => $user)
                            <div class="modal fade none-border" id="{{'delete_adver'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete Advertisement</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Advertisement Delete??</h2>
                                        <p>Are you Sure you want to Delete it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_adver/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
 @include('layouts.footer')