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
</style>

 <!-- <?php echo"<pre>"; Print_r($users_type); echo "</pre>" ?>  -->
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
                                    <li class="active">User List</li>
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
                                        <div class="header-title">User Views</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#" data-toggle="modal" data-target="#add-usertype"><i class="ti-menu-alt"></i>Add user type</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add User</a></li>
                                               
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
                                    <h4>User List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Roll</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>

                                                <tr>
                                                    <td><img class="icon_image"src="images/avatar/{{ $user->image }}" /></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->city}}</td>
                                                    <td>{{$user->type_name}}</td>
                                         <td class="action_btn">
                                      <!--   <a class="ac_btn" href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                        <a class="ac_btn" href="{{url('edit_profile/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <a class="ac_btn" href="{{url('delete_user/'.$user->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 
                                        


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
                            <div class="modal fade none-border" id="add-usertype">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Add user type </strong></h4>
                                                    </div>
                                                   
                                            <form method="POST" action="{{'create'}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <label class="control-label">Type</label>
                                                        <input class="form-control form-white" placeholder="Enter Type" type="text" name="name" required />
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






 <!--MODAL -->
                            <div class="modal fade none-border" id="add-users">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Add user</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                            <form method="POST" action="{{'adduser'}}" enctype="multipart/form-data">
                                                 {{ csrf_field() }}
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                        <label class="control-label">Name</label>
                                                                    <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
                                                                </div>
                                                             
                                                            
                                                            <div class="col-md-6">
                                                        <label class="control-label">Email</label>
                                                                    <input class="form-control form-white" placeholder="Enter email" type="text" name="email" required=""/>
                                                                </div>
                                                             
                                                         

                                                            <div class="col-md-6">
                                                        <label class="control-label">City</label>
                                                                    <input class="form-control form-white" placeholder="Enter city" type="text" name="city" required=""/>
                                                                </div>

                                <div class="col-md-6">
                                <label class="control-label">User type</label>
                                                        
                                <select class="form-control" id="user_type" name="user_type" required="">
                                    <option value="">Please select</option>
                                        <?php foreach ($users_type as $key=>$username): ?>
                                        <option value="<?php echo $username->id; ?>" <?php
                                        if (isset($user_type) && Input::old('user_type') == $username->name)
                                        {
                                            echo 'selected="selected"';
                                        }
                                        ?>>
                                        <?php  echo $username->name; ?></option>
                                        <?php endforeach; ?>
                                </select>

                                </div>

                                                                <div class="col-md-6">
                                                        <label class="control-label">Password</label>
                                                         <input class="form-control form-white" placeholder="Enter password" type="password" name="password" required="" />
                                                                </div>

                                                        <div class="col-md-6">
                                                        <label class="control-label">Image</label>
                                                         <input class="form-control form-white" type="file" name="img" required="" />
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
                          <!--END MODAL -->

   @include('layouts.footer')
