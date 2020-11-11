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
                                    <li class="active">certification List</li>
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
                                        <div class="header-title">Certificate Add</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                
                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Certification</a></li>
                                               
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
                                    <h4>Certification List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Create At</th>
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
                                                    <td>{{$user->created_at}}</td>
                                         <td class="action_btn">

                                        <!-- <a class="ac_btn" href="{{url('edit_profile/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  -->

                                          <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_certification'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 
                                        
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
                                                        <h4 class="modal-title"><strong>Add Certificate</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                            <form method="POST" action="{{url('certification')}}" enctype="multipart/form-data">
                                                 {{ csrf_field() }}
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                        <label class="control-label">Certificate Name</label>
                                                                    <input class="form-control form-white" placeholder="Enter Name" type="text" name="name"/>
                                                                     @if ($errors->has('name'))
                                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                                    @endif
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


                              @if(!empty($users))
                                 @foreach($users as $key => $user)
                            <div class="modal fade none-border" id="{{'delete_certification'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete Certification</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Certification Delete??</h2>
                                        <p>Are you Sure you want to Delete it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_certification/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif

   @include('layouts.footer')
