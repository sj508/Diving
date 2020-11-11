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
                                    <li class="active">edit classes</li>
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
                                    <h4>Edit Diving Classes</h4>
                                   
                                </div>


                                <div class="card-body">
                                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('post_edit_classes')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}


                                 <input type="hidden" name="id" value="{{$product[0]->id}}">
                                            


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Class Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="class_name" class="form-control" placeholder="Type your name" value="{{$product[0]->name}}">
                                                </div>
                                            </div>

                                            


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Courses Name</label>
                                                <div class="col-sm-10">
                                                      <select class="form-control" id="courses_name" class="courses_name" name="courses_name" required="">
                                                        <option value="{{$product[0]->courses_name}}">Please select</option>
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
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Tranner Name</label>
                                                <div class="col-sm-10">
                                                  <select class="form-control" id="tranner_name" name="tranner_name" required="">
                                                    <option value="{{$product[0]->tranner_name}}">Please select</option>
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
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="location" class="form-control" placeholder="enter place" value="{{$product[0]->location}}" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Start Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="start_date" class="form-control" placeholder="enter price" value="{{$product[0]->start_date}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Start Time</label>
                                                <div class="col-sm-10">
                                                    <input type="time" name="start_time" class="form-control" placeholder="enter price" value="{{$product[0]->start_time}}">
                                                </div>
                                            </div>


                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">End Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="end_date" class="form-control" placeholder="enter date" value="{{$product[0]->end_date}}">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">End Time</label>
                                                <div class="col-sm-10">
                                                    <input type="time" name="end_time" class="form-control" placeholder="enter price" value="{{$product[0]->end_time}}">
                                                </div>
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

       