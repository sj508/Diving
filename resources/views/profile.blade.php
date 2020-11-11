@include('layouts.header')

@php
$user = Auth::guard('web')->user();
$user_type = $user->user_type;

@endphp
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
                                    <li><a href="{{'home'}}">Dashboard</a></li>
                                    <li class="active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="user-profile">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="user-photo m-b-30">
                             <img class="img-responsive" src="images/avatar/{{ Auth::user()->image }}" alt="" />
                                                </div>
                                
                                            </div>
                                            <div class="col-lg-10">
                                        <div class="user-profile-name">{{ Auth::user()->name }}</div>
                                                <div class="user-Location"><i class="ti-location-pin"></i>{{ Auth::user()->city }}</div>
                                                 @if($user_type == 0)
                                                <div class="user-job-title">Super Admin</div>
                                                @else
                                                <div class="user-job-title">Tranner</div>
                                                 @endif
                                            
                                        
                                                <div class="custom-tab user-profile-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="1">
                                                            <div class="contact-information">
                                                                <h4>Contact information</h4>
                                                                <div class="phone-content">
                                                                    <span class="contact-title">Phone:</span>
                                                                    <span class="phone-number">{{ Auth::user()->mobile }}</span>
                                                                </div>

                                                                <div class="address-content">
                                                                    <span class="contact-title">Address:</span>
                                                                    <span class="mail-address">{{ Auth::user()->address }}</span>
                                                                </div>

                                                                <div class="email-content">
                                                                    <span class="contact-title">Email:</span>
                                                                    <span class="contact-email">{{ Auth::user()->email }}</span>
                                                                </div>

                                                                <div class="address-content">
                                                                    <span class="contact-title">City:</span>
                                                                    <span class="mail-address">{{ Auth::user()->city }}</span>
                                                                </div>

                                                                <div class="website-content">
                                                                    <span class="contact-title">State:</span>
                                                                    <span class="contact-website">{{ Auth::user()->state }}</span>
                                                                </div>
                                                              
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                      <!--   <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="profile-widget">
                                                <div class="stat-text">Job Done</div>
                                                <div class="stat-digit">19</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="profile-widget">
                                                <div class="stat-text">Ongoing Job</div>
                                                <div class="stat-digit">6</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="profile-widget">
                                                <div class="stat-text">Reject</div>
                                                <div class="stat-digit">6</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="stat-widget-one">
                                            <div class="profile-widget">
                                                <div class="stat-text">Upcomming</div>
                                                <div class="stat-digit">29</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div> -->
                        <!-- /# column -->
                    </div>
                   
                   
                </div>
            </div>
        </div>
    </div>


@include('layouts.footer')
   





