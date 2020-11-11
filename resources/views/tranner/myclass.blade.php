@include('layouts.header')

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>My Classes Calender</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">My Classes Calender</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Calendar View</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <!-- BEGIN MODAL -->
                                        <div class="modal fade bd-example-modal-lg" id="event-modal">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                                                        <h4 class="modal-title"><strong>Class Detail</strong> </h4>
                                                    </div>
                                                 <div class="modal-content-inner" id="show_model_details">
													   
													</div>

                                                </div>
                                            </div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                 <!--    <div class="row">
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
 @include('layouts.footer_tranner')